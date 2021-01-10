<?php

namespace App\Http\Controllers;

use App\busSeat;
use Illuminate\Http\Request;

class BusSeatController extends Controller
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

        $busSeat = busSeat::find($request->bus_seat_id);
        $busSeat->customer_name = $request->name;
        $busSeat->customer_phone  = $request->phone;
        $busSeat->status_id   = 3;
        $busSeat->save();



        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\busSeat  $busSeat
     * @return \Illuminate\Http\Response
     */
    public function show(busSeat $busSeat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\busSeat  $busSeat
     * @return \Illuminate\Http\Response
     */
    public function edit(busSeat $busSeat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\busSeat  $busSeat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, busSeat $busSeat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\busSeat  $busSeat
     * @return \Illuminate\Http\Response
     */
    public function destroy(busSeat $busSeat)
    {
        //
    }
}
