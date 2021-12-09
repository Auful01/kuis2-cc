<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\Transaction;
use App\Models\Treatment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        // $doctor = Doctr
        $reservasi = Reservation::with('user')->where('user_id', $user);
        $reservasi_detail = Reservation::with('user', 'reservation')->where('user', $user);
        $order = Order::with('user')->where('user_id', $user)->get();
        return view('user.transaction', ['order' => $order]);
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
        // Transaction::create([
        //     ''
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservasi = Reservation::find($id);
        $reservasi->user_confirm = $request->user_confirm;
        $reservasi->status = $request->status;
        $reservasi->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::find($id)->delete();
        return redirect()->route('transaction.index');
    }

    public function changeConfirmation(Request $request)
    {
        $transaksi = Reservation::find($request->id);
        // return $transaksi;
        $transaksi->user_confirm = $request->data;
        $transaksi->save();
    }

    public function changeStatus(Request $request)
    {
        $transaksi = Reservation::find($request->id);
        // return $transaksi;
        $transaksi->status = $request->data;
        $transaksi->save();
    }

    public function printReserv($id)
    {
        $treatment = Reservation::find($id);
        // return $treatment;
        $pdf = PDF::loadview('print-treatment', compact('treatment'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function reschedule(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->time = $request->time;
        $reservation->date = $request->date;
        $reservation->save();
        return redirect()->route('reservasi.index');
    }
}
