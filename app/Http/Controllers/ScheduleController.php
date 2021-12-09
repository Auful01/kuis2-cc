<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Schedule::create([
            'doctor_id' => $request->doctor_id,
            'monday_start' => $request->monday_start,
            'monday_end' => $request->monday_end,
            'tuesday_start' => $request->tuesday_start,
            'tuesday_end' => $request->tuesday_end,
            'wednesday_start' => $request->wednesday_start,
            'wednesday_end' => $request->wednesday_end,
            'thursday_start' => $request->thursday_start,
            'thursday_end' => $request->thursday_end,
            'friday_start' => $request->friday_start,
            'friday_end' => $request->friday_end,
        ]);

        return redirect()->route('doctor-list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->monday_start = $request->monday_start;
        $schedule->monday_end = $request->monday_end;
        $schedule->tuesday_start = $request->tuesday_start;
        $schedule->tuesday_end = $request->tuesday_end;
        $schedule->wednesday_start = $request->wednesday_start;
        $schedule->wednesday_end = $request->wednesday_end;
        $schedule->thursday_start = $request->thursday_start;
        $schedule->thursday_end = $request->thursday_end;
        $schedule->friday_start = $request->friday_start;
        $schedule->friday_end = $request->friday_end;
        $schedule->save();

        return redirect()->route('doctor-list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
