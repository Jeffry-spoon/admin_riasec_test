<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportResult implements FromView
{
    /**
    * @return \Illuminate\Support\Collection\
    */
    public function view():View
    {
        $results = DB::table('results')
        ->select('users.id',
        'users.name',
        'users.email',
        'users_details.education_level',
        'users_details.phone_number',
        'users_details.school_name',
        'users_details.occupation_desc',
        'results.types_id',
        'results.score',
        'results.start_time',
        'results.end_time',
        'results.difference',
        'results.created_at',
        'events.title as event_title',
        'types.type_name as type_title')
        ->join('users', 'users.id', '=', 'results.user_id')
        ->join('users_details', 'users_details.id', '=', 'results.user_id')
        ->join('events', 'events.id', '=', 'results.event_id')
        ->join('types',  'types.id', '=', 'results.types_id')
        ->orderBy('results.created_at', 'DESC')
        ->get();

    return view('components.table.resultTable', ['results' => $results]);
    }


}