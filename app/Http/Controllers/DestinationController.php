<?php

namespace App\Http\Controllers;

use App\destination;
use App\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = setting::where('table_name','destinations')->first();
        $settings->setting= json_decode(  json_decode(  $settings->setting,true),true);
        $dataArray=[
            'settings'=>$settings,
            'items' => destination::all(),
        ];

        return view('superAdmin.destination.index', compact('dataArray'));
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
        
        destination::create($request->all());
        return redirect()->back()->withSuccess(['Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, destination $destination)
    {
        
        $destination->update($request->all());
        return redirect()->back()->withSuccess(['Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(destination $destination)
    {
        
        $destination->delete();
        return Redirect::back()->withErrors(["Item Deleted" ]);
    }
}
