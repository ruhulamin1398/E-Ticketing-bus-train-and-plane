<?php

namespace App\Http\Controllers;

use App\bus;
use App\busSchedule;
use App\busSeat;
use App\company;
use App\destination;
use App\seat;
use App\setting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BusScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = setting::where('table_name','bus_schedules')->first();
        $settings->setting= json_decode(  json_decode(  $settings->setting,true),true);
        $dataArray=[
            'settings'=>$settings,
            'items' => busSchedule::all(),
            'buses' => bus::all(),
            'companies' => company::all(),
            'to_destinations' => destination::all(),
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
        $busSchedule = new busSchedule;
        $busSchedule->bus_id = $request->bus_id;

        $busSchedule->from_destination_id = 1; // Auth ::user()->counter_id
        $busSchedule->company_id = 1;  // Auth ::user()->company_id

        $busSchedule->to_destination_id = $request->to_destination_id;
        $busSchedule->distance = $request->distance;
        $busSchedule->time = $request->time;
        $busSchedule->cost = $request->cost;
        $busSchedule->schedule = $request->schedule;
        $busSchedule->save();

        $seats = seat::all();
        $totalSeats = $busSchedule->buses->total_seat;
        
        for($i = 0; $i<$totalSeats; $i++)
        {
        
          $busSeat = new busSeat;
          $busSeat->schedule_id = $busSchedule->id;
          $busSeat->status_id = 1;
          $busSeat->seat_id = $seats[$i]->id;
          $busSeat->seat_name = $seats[$i]->name;
          $busSeat->save();
        }
        return redirect()->back()->withSuccess(['Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\busSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(busSchedule $busSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\busSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(busSchedule $busSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\busSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, busSchedule $busSchedule)
    {
        $busSchedule->update($request->all());
        return redirect()->back()->withSuccess(['Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\busSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(busSchedule $busSchedule)
    {
        $busSchedule->delete();
        return Redirect::back()->withErrors(["Item Deleted" ]);
    }
}
