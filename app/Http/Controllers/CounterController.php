<?php

namespace App\Http\Controllers;

use App\counter;
use Illuminate\Http\Request;

class CounterController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(counter $counter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(counter $counter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, counter $counter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(counter $counter)
    {
        //
    }
}
