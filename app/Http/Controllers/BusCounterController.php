<?php

namespace App\Http\Controllers;

use App\busCounter;
use App\company;
use App\destination;
use App\setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BusCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        


    $settings = setting::where('table_name','bus_counters')->first();
    $settings->setting= json_decode(  json_decode(  $settings->setting,true),true);
    $dataArray=[
    'settings'=>$settings,
    'items' => busCounter::all(),
    'Companies' => company::all(),
    'destination' => destination::all(),
];

return view('bus.admin.counter.index', compact('dataArray'));

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
        busCounter::create($request->all());
        return redirect()->back()->withSuccess(['Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function show(busCounter $busCounter)
    {
        return $busCounter;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(busCounter $busCounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, busCounter $busCounter)
    {
        
        $busCounter->update($request->all());
        
        return redirect()->back()->withSuccess(['Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(busCounter $busCounter)
    {
        $busCounter->delete();
        return Redirect::back()->withErrors(["Item Deleted" ]);
    }
}
