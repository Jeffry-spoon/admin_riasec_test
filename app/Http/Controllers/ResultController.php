<?php

namespace App\Http\Controllers;

use App\Exports\ExportResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $results = DB::table('users')
    ->where('users.is_admin', false)
    ->join('results', 'users.id', '=', 'results.user_id')
    ->join('users_details', 'users.id', '=', 'users_details.user_id')
    ->select(
        'users.id',
        'users.name',
        'users.email',
        'users_details.education_level',
        'users_details.gender',
        'users_details.phone_number',
        'users_details.school_name',
        'users_details.occupation_desc',
        'results.types_id',
        'results.score',
        'results.created_at'
    )
    ->orderBy('results.created_at', 'desc') // Order by formatted datetime
    ->get();

        return view('result', compact('results'));
    }

    public function exportExcel () {
        return Excel::download(new ExportResult, "RiasecResult.xlsx");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
