<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::with('treatment')->get();
        return view('user.transaction', ['reservation' => $reservation]);
    }

    public function indexAdmin()
    {
        $reservation = Reservation::with('treatment')->get();
        return view('admin.reservasi', ['reservation' => $reservation]);
    }

    public function indexUser($id)
    {
        $reservation = Reservation::with('user', 'treatment')->where('user_id', $id)->get();
        return view('user.transaction', ['reservation' => $reservation]);
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
        Reservation::create([
            'user_id' => $user,
            'treatment_id' => $request->treatment_id,
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
        // $reservation = Reservation::find($id);
        // $reservation->total;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::find($id)->delete();
        return redirect()->route('reservasi.index');
    }
}
