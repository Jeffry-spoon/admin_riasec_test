<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

use function Laravel\Prompts\error;

class QuizCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')
        ->get();

        foreach ($categories as $category) {
            $user = DB::table('users')
                        ->select('name')
                        ->where('id', $category->user_id)
                        ->first();

            $category->username = $user->name;
        }
        return view('questions/data-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = DB::table('categories')
        ->where('slug', $slug)
        ->first();

        // $jobsData = DB::table('jobs')
        // ->where('categories_id', $id)
        // ->get();

        return view('questions/edit-category', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {

        $validator = Validator::make($request->all(), [
            'description' => ['nullable', 'string', 'max:99999'], // Ubah validasi description
        ]);

        // Periksa apakah validasi gagal
        if($validator->fails()){
            return  response()->json(['message' => $validator->errors()->first()], 422 );
        }

        // Konversi teks ke HTML
        $htmlDescription = $request->input('description');

        // Update data kategori menggunakan Query Builder
        $dataCat = DB::table('categories')
            ->where('slug', $slug)
            ->update([
                'description' => $htmlDescription,
                'updated_at' => now()
            ]);

        $data = DB::table('categories')
            ->where('slug', $slug)
            ->first();

        if ($dataCat > 0) {
            return view('questions/edit-category', compact('data'));
        } else {
            return view('errors.500');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}