<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json(['message' => 'Successfully fetched schedules', 'data' => $schedules], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedule = Schedule::create($request->all());
        return response()->json(['message' => 'Schedule successfully created', 'data' => $schedule], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return response()->json(['message' => 'Successfully fetched schedule', 'data' => $schedule], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->all());
        return response()->json(['message' => 'Schedule successfully updated', 'data' => $schedule], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json(['message' => 'Schedule successfully deleted'], 200);
    }
}
