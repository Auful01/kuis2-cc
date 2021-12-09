<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Schedule;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consult = Consultation::with('doctor')->get();
        return view('user.consult', ['consult' => $consult]);
    }

    public function indexUser($id)
    {
        $consult = Consultation::with('doctor', 'user')->where('user_id', $id)->get();
        return view('user.consult', ['consult' => $consult]);
    }

    public function indexAdmin()
    {
        $consult = Consultation::with('doctor', 'user')->get();
        return view('admin.consult', ['consult' => $consult]);
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
        $user = auth()->user()->id;
        Consultation::create([
            'user_id' => $user,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'time' => $request->time,
            'price' => $request->price,
        ]);
        return redirect()->route('reservasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::all();
        $schedule = Schedule::with('doctor')->where('doctor_id', $id)->first();
        return view('user.doctor-consul', ['doctor' => $doctor, 'schedule' => $schedule]);
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
        //
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

    public function reschedule(Request $request, $id)
    {
        $consult = Consultation::find($id);
        $consult->time = $request->time;
        $consult->date = $request->date;
        $consult->save();
        return redirect()->route('doctor-consul.index');
    }

    public function changeStatus(Request $request)
    {
        $consult = Consultation::find($request->id);
        $consult->status = $request->status;
        $consult->save();
    }

    public function changeConfirm(Request $request)
    {
        $consult = Consultation::find($request->id);
        $consult->confirm = $request->confirm;
        $consult->save();
    }

    public function printConsult($id)
    {
        // return $id;
        $consult = Consultation::find($id);
        $pdf = PDF::loadview('print-consul', compact('consult'))->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
}
