<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Set the cutoff day to Saturday (6 is the day of the week, with Sunday as 0 and Saturday as 6)
    $cutOffDay = 6;

    // Create a Carbon instance for today's date
    $today = Carbon::today();

    // Calculate the difference in days from today to the cutoff day
    $daysUntilCutoff = ($today->dayOfWeek - $cutOffDay + 7) % 7;

    // Calculate the start and end date of the current cutoff week
    $startOfWeek = $today->copy()->subDays($daysUntilCutoff)->startOfWeek(Carbon::SUNDAY);
    $endOfWeek = $today->copy()->subDays($daysUntilCutoff)->endOfWeek(Carbon::SATURDAY);

    // Format date
    $formattedStartOfWeek = $startOfWeek->format('Y-m-d H:i:s');
    $formattedEndOfWeek = $endOfWeek->format('Y-m-d H:i:s');

    $results = DB::table('users')
        ->where('users.is_admin', false)
        ->leftJoin('results', function ($join) use ($formattedStartOfWeek, $formattedEndOfWeek) {
            $join->on('users.id', '=', 'results.user_id')
                ->whereBetween('results.created_at', [$formattedStartOfWeek, $formattedEndOfWeek]);
        })
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
        ->get();

    dd($results);

    return view('welcome');
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
