<?php

namespace App\Http\Controllers;

use App\passenger;
use App\road;
use App\ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = ticket::where('user_id',Auth::user()->id)->get();

    
       return view('passengerDeshboard',compact('tickets'));
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
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, passenger $passenger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(passenger $passenger)
    {
        //
    }
}
