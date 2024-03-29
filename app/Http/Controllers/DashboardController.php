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

    $startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY); // Sunday
    $endOfWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY); // Saturday

    // Format date
    $formattedStartOfWeek = $startOfWeek->format('Y-m-d H:i:s');
    $formattedEndOfWeek = $endOfWeek->format('Y-m-d H:i:s');

    $results = DB::table('results')
    ->select('results.id', 'users.name','users.email', 'users_details.education_level', 'users_details.school_name', 'results.score', 'results.created_at as test_date', 'results.difference as waktu_pengerjaan', 'results.event_id', 'events.title', 'results.difference', 'results.created_at','results.start_time', 'results.end_time')
    ->join('users', 'users.id', '=', 'results.user_id')
    ->whereBetween('results.created_at', [$formattedStartOfWeek, $formattedEndOfWeek])
    ->join('users_details', 'users_details.user_id', '=', 'results.user_id')
    ->join('events', 'events.id', '=', 'results.event_id')
    ->get();
    $grouped = $results->groupBy('event_id');


        // dd($grouped);

    $countResults = $results->count();

    // total result
    $totalResult = DB::table('results')
    ->count();
    // $totalResult = 100000;
    $total_format = number_format($totalResult, 0, ',', '.');

    // total user
    $totalUser = DB::table('users')
    ->where('is_admin', false)
    ->count();

    return view('dashboard',
    compact(
        'grouped',
        'countResults',
        'formattedEndOfWeek',
        'formattedStartOfWeek',
        'totalResult',
        'total_format',
        'totalUser'
    ));
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
