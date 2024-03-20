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
        $results = DB::table('results')
        ->select(
            'users.id as user_id',
            'users.name',
            'users.email',
            'users_details.education_level',
            'users_details.phone_number',
            'users_details.school_name',
            'users_details.occupation_desc',
            'users_details.newsletter',
            'results.types_id',
            'results.score',
            'results.start_time',
            'results.end_time',
            'results.difference',
            'results.created_at',
            'events.title as event_title',
            'types.type_name as type_title'
        )
        ->join('users', 'users.id', '=', 'results.user_id')
        ->join('users_details', 'users_details.user_id', '=', 'results.user_id')
        ->join('events', 'events.id', '=', 'results.event_id')
        ->join('types', 'types.id', '=', 'results.types_id')
        ->orderBy('results.created_at', 'DESC')
        ->get();
        // $results = DB::table('results')
        // ->get();

        // dd($results);

        return view('result', compact('results'));
    }

    public function exportExcel () {
        $results = DB::table('results')
    ->select(
        'users.id as user_id',
        'users.name',
        'users.email',
        'users_details.education_level',
        'users_details.phone_number',
        'users_details.school_name',
        'users_details.occupation_desc',
        'users_details.newsletter',
        'results.types_id',
        'results.score',
        'results.start_time',
        'results.end_time',
        'results.difference',
        'results.created_at',
        'events.title as event_title',
        'types.type_name as type_title'
    )
    ->join('users', 'users.id', '=', 'results.user_id')
    ->join('users_details', 'users_details.user_id', '=', 'results.user_id')
    ->join('events', 'events.id', '=', 'results.event_id')
    ->join('types', 'types.id', '=', 'results.types_id')
    ->orderBy('results.created_at', 'DESC')
    ->get();

$count = 1;
foreach ($results as $result) {
    $stackings[] = [
        'name' => $result->name,
        'email' => $result->email,
        'education_level' => $result->education_level,
        'phone_number' => $result->phone_number,
        'school_name' => $result->school_name,
        'occupation' => $result->occupation_desc,
        'typesID' => $result->types_id,
        'score' => $result->score,
        'start_time' => $result->start_time,
        'end_time' => $result->end_time,
        'difference' => $result->difference,
        'created_at' => $result->created_at,
        'event_title' => $result->event_title,
        'type_title' => $result->type_title,
        'newsletter' => $result->newsletter
    ];
    $count++;
}
        // Membuat objek ExportResult dan meneruskan $stackings
    $exportResult = new ExportResult($stackings);

    // Menggunakan objek ExportResult
        return Excel::download($exportResult, 'Export Result- ' . date('dmY') . '.xlsx');
    }

    public function download_pdf() {
    $mpdf = new \Mpdf\Mpdf();
    $results = DB::table('results')
        ->select('users.id',
        'users.name',
        'users.email',
        'users_details.education_level',
        'users_details.phone_number',
        'users_details.school_name',
        'users_details.occupation_desc',
        'users_details.newsletter',
        'results.types_id',
        'results.score',
        'results.start_time',
        'results.end_time',
        'results.difference',
        'results.created_at',
        'events.title as event_title',
        'types.type_name as type_title')
        ->join('users', 'users.id', '=', 'results.user_id')
        ->join('users_details', 'users_details.user_id', '=', 'results.user_id')
        ->join('events', 'events.id', '=', 'results.event_id')
        ->join('types',  'types.id', '=', 'results.types_id')
        ->orderBy('results.created_at', 'DESC')
        ->get();

        $count = 1;
        foreach ($results as $result) {
        $stackings[] = [
        'name' => $result->name,
        'email' => $result->email,
        'education_level' => $result->education_level,
        'phone_number' => $result->phone_number,
        'school_name' => $result->school_name,
        'occupation' => $result->occupation_desc,
        'typesID' => $result->types_id,
        'score' => $result->score,
        'start_time' => $result->start_time,
        'end_time' => $result->end_time,
        'difference' => $result->difference,
        'created_at' => $result->created_at,
        'event_title' => $result->event_title,
        'type_title' => $result->type_title,
        'newsletter' => $result->newsletter
    ];
    $count++;
}
    $mpdf->WriteHTML(view('components.table.resultTable', ['stackings' => $stackings]));
    $mpdf->Output('download-pdf-result.pdf ','D');
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
