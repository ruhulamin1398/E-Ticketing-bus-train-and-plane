<?php

namespace App\Http\Controllers;

use App\bus;
use App\company;
use App\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = setting::where('table_name','buses')->first();
        $settings->setting= json_decode(  json_decode(  $settings->setting,true),true);
        $dataArray=[
            'settings'=>$settings,
            'items' => bus::all(),
            'Companies' => company::all(),
        ];

        return view('bus.admin.bus.index', compact('dataArray'));

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
        bus::create($request->all());
        return redirect()->back()->withSuccess(['Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bus $bus)
    {
        $bus->update($request->all());
        return redirect()->back()->withSuccess(['Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(bus $bus)
    {
        $bus->delete();
        return Redirect::back()->withErrors(["Item Deleted" ]);
    }
}
