<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
                DB::raw('COUNT(DISTINCT questions.id) as total_questions')
            )
            ->addSelect(DB::raw("'true' as is_project")) // Tambahkan kolom is_project
    ->leftJoin('results', 'types.id', '=', 'results.types_id')
    ->leftJoin('questions', 'types.id', '=', 'questions.types_id')
    ->where('is_project', true) // Filter hanya di mana is_project true
    ->groupBy('types.id', 'types.type_name', 'types.slug', 'types.created_at', 'types.updated_at', 'types.deleted_at', 'types.is_active')
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

        return redirect()->route('questions.index');
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
        // $data = DB::table('types')
        // ->where('slug', $slug)
        // ->get();

        // dd($data);

        return view('surveys.question.edit-questions');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
        return redirect()->route('questions.index');
    }
}