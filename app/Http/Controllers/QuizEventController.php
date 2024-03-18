<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class QuizEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = DB::table('events')
        ->select('events.title', 'events.slug', 'events.cut_off_date', 'events.created_at', 'events.updated_at', 'users.name as updated_by')
        ->join('users', 'events.user_id', '=', 'users.id')
        ->whereNull('events.deleted_at')
        ->get();

        return view('surveys.events.data-event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('surveys.events.add-event');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari request
    $validatedData = $request->validate([
    'title' => 'required|string|max:255',
    'slug' => 'required|string|max:255',
    'date' => 'required|date|after_or_equal:' . now()->format('Y-m-d'),
    'is_active' => 'nullable|boolean',
    ]);

    // Simpan data menggunakan Query Builder
    DB::table('events')->insert([
    'title' => $validatedData['title'],
    'slug' => $validatedData['slug'],
    'cut_off_date' => $validatedData['date'],
    'is_active' => $request->has('is_active') ? 1 : 0,
    'user_id' =>  App::make('currentUserId'), // Tambahkan ID pengguna ke dalam kolom user_id
    'created_at' => now(),
    'updated_at' => now(),
    ]);

    session()->flash('alert', ['type' => 'success', 'message' => 'Your Data is Submitted']);
    return redirect()->route('event.index');
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
    public function edit(string $slug)
    {
        $events = DB::table('events')
        ->whereNull('deleted_at')
        ->where('slug', $slug)
        ->get();

        return view ('surveys.events.edit-event', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
      // Validasi request
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'is_active' => 'nullable|boolean',
        ]);

        // Lakukan tindakan update berdasarkan slug yang diberikan
        $affected = DB::table('events')
                    ->where('slug', $slug)
                    ->update([
                        'title' => $request->title,
                        'cut_off_date' => $request->date,
                        'is_active' => $request->has('is_active') ? 1 : 0, // Gunakan has() untuk mengecek keberadaan is_active dalam request
                        'updated_at' => Carbon::now(),
                        'user_id' =>  App::make('currentUserId')
                    ]);

        if ($affected > 0) {
            // Redirect atau response yang sesuai jika data berhasil diupdate
            session()->flash('alert', ['type' => 'success', 'message' => ' Your Data has been updated ']);
            return redirect()->route('event.index');
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('event.index')->with('error', 'Event not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $events = DB::table('events')
        ->whereNull('deleted_at') // Pastikan deleted_at = null sebelumnya
        ->where('slug', $slug)
        ->update([
            'deleted_at' => Carbon::now(),
            'user_id' =>  App::make('currentUserId')
        ]);

        session()->flash('alert', ['type' => 'success', 'message' => ' Your Data has been deleted ']);

        return redirect()->route('event.index');
    }
}
