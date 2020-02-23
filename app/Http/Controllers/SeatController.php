<?php

namespace App\Http\Controllers;

use App\seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats= seat::all();

        return view('seats',compact('seats'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(seat $seat)
    {
        //
    }
    public function seatUpdate(Request $request){



        $seat= seat::find($request->id);
        $seat->name= $request->name;

        $seat->save();



        return redirect(route('seats.index'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, seat $seat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(seat $seat)
    {
        //
    }
}
