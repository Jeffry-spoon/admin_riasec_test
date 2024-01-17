<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ExportResult implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection\
    */
    public function collection()
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

    return $results;
    }
}
