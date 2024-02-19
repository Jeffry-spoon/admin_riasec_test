<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class QuizEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = DB::table('events')
        ->whereNull('deleted_at')
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:' . Carbon::now()->format('Y-m-d'),
            'is_active' => 'nullable|boolean',
        ]);

        // Simpan data menggunakan Query Builder
    DB::table('events')->insert([
        'title' => $validatedData['title'],
        'slug' => $validatedData['slug'],
        'cut_off_date' => $validatedData['date'],
        'is_active' => $request->has('is_active') ? 1 : 0,
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
    public function edit(string $id)
    {
        //
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
        //
    }
}