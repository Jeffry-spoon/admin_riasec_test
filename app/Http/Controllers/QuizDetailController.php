<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class QuizDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalData = DB::table('types')
        ->select(
            'types.id',
            'types.type_name',
            'types.slug',
            'types.created_at',
            'types.updated_at',
            'types.deleted_at',
            'types.is_active',
            DB::raw('COUNT(DISTINCT results.id) as total_participants'),
            DB::raw('COUNT(DISTINCT questions.id) as total_questions'),
            'users.name as updated_by' // Menambahkan nama pengguna (user) yang melakukan pembaruan
        )
        ->leftJoin('results', 'types.id', '=', 'results.types_id')
        ->leftJoin('questions', 'types.id', '=', 'questions.types_id')
        ->leftJoin('users', 'types.user_id', '=', 'users.id') // Melakukan join ke tabel users
        ->where('is_project', true) // Filter hanya di mana is_project true
        ->groupBy('types.id', 'types.type_name', 'types.slug', 'types.created_at', 'types.updated_at', 'types.deleted_at', 'types.is_active', 'users.name')
        ->get();

        return view('surveys/question/data-questions', compact('totalData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('surveys.question.add-questions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $now = Carbon::now();

        DB::table('types')->insert([
            'type_name' => $request->title,
            'slug'=> $request->slug,
            'is_active' => false,
            'is_project' => true,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        session()->flash('alert', ['type' => 'success', 'message' => 'Your Data is Submitted']);

        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $type = DB::table('types')
        ->select('id', 'type_name', 'slug', 'is_active')
        ->where('id', $id)
        ->first();

        $questions = DB::table('questions')
            ->select('questions.id', 'questions.questions_text', 'categories.category_text')
            ->join('types', 'questions.types_id', '=', 'types.id')
            ->join('categories', 'questions.categories_id', '=', 'categories.id')
            ->where('types.id', $type->id)
            ->get();

        $categories = DB::table('categories')
            ->select('id','category_text','slug')
            ->get();

        return view('surveys.question.edit-questions', compact('categories', 'questions', 'type'));
        }

/**
* Update the specified resource in storage.
*/
public function insert_questions(Request $request, string $id)
{

     // Validasi request jika diperlukan
     $request->validate([
        'questions_text' => 'required|array',
        'questions_text.*' => 'required|string',
        'category' => 'required|array',
        'category.*' => 'required|integer',
    ]);

    // Proses data dari permintaan
    $questions_text = $request->input('questions_text');
    $categories = $request->input('category');

    // Mulai transaksi
    DB::beginTransaction();

    try {
        // Loop melalui data yang diterima
        foreach ($questions_text as $index => $question_text) {
            // Lakukan validasi atau pemrosesan lainnya jika perlu

            // Simpan data ke database
            DB::table('questions')->insert([
                'questions_text' => $question_text,
                'categories_id' => $categories[$index],
                'types_id' => $id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Commit transaksi jika tidak ada kesalahan
        DB::commit();

        // Set pesan sukses
        session()->flash('alert', ['type' => 'success', 'message' => ' Your Data is Submitted']);

        // Kirim respons kembali ke klien
        return redirect()->route('type.index');
    } catch (\Exception $e) {
        // Kirim respons dengan pesan error
        return response()->json(['message' => 'Failed to save data: ' . $e->getMessage()], 500);
    }
}

public function update_questions(Request $request, string $id)
{
    // dd($request);
     // Validasi request


    // Mulai transaksi database
    DB::beginTransaction();

    try {
        // Hapus semua pertanyaan terkait dengan jenis survei yang ada
        DB::table('questions')
            ->where('types_id', $id)
            ->delete();

        // Loop melalui data yang diterima
        if(!empty($request->input('questions'))){
        foreach ($request->questions_text as $index => $question_text) {
            // Buat pertanyaan baru berdasarkan data yang diterima
            DB::table('questions')->insert([
                'questions_text' => $question_text,
                'categories_id' => $request->category[$index],
                'types_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }};

        // Commit transaksi jika tidak ada kesalahan
        DB::commit();

        // Set pesan sukses
        session()->flash('alert', ['type' => 'success', 'message' => ' Your Data is Submitted']);

          // Kirim respons kembali ke klien
          return redirect()->route('type.index');
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollBack();
        // Kirim respons dengan pesan error
        return response()->json(['message' => 'Failed to update questions: ' . $e->getMessage()], 500);
    }
}


public function update_type(Request $request, string $id)
{

    // Mendapatkan ID pengguna yang sedang masuk
    $user_id = Auth::id();

    // Mengambil data jenis survei berdasarkan ID
    $type = DB::table('types')->where('id', $id)->first();

    if (!$type) {
        return redirect()->back()->with('error', 'Survey not found.');
    }

    // Jika status aktif berubah menjadi true
    if ($request->is_active && !$type->is_active) {
        // Nonaktifkan jenis survei lain yang aktif
        DB::table('types')->where('is_active', true)->update(['is_active' => false]);
    }

    // Mengupdate data jenis survei
    DB::table('types')
        ->where('id', $id)
        ->update([
            'type_name' => $request->type_name,
            'slug' => $request->slug,
            'is_active' => $request->is_active ?? 0, // Memperbarui is_active sesuai dengan request
            'user_id' => $user_id, // Menambahkan kolom updated_by
            'updated_at' => now(), // Mengupdate kolom updated_at secara otomatis
        ]);

    // Setelah berhasil mengupdate, redirect dengan pesan sukses
    session()->flash('alert', ['type' => 'success', 'message' => 'Data has been successfully updated.']);
    return redirect()->route('type.index');
}

/**
* Remove the specified resource from storage.
*/
public function destroy(string $id)
{
DB::table('types')
->where('id', $id) // Filter data berdasarkan ID
->where('is_project', true) // Filter data di mana is_project true
->update(['is_project' => false]); // Update kolom is_project menjadi false

session()->flash('alert', ['type' => 'success', 'message' => ' Data has been successfully removed from the system']);
return redirect()->route('type.index');
}
}
