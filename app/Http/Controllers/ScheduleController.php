<?php

namespace App\Http\Controllers;

use App\bus_seat;
use App\counter;
use App\road;
use App\schedule;
use App\seat;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $counters = counter::all();
        $roads = road::all();
        $schedules = schedule::all();

        return view('schedules', compact('roads', 'counters', 'schedules'));
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


        $schedule = new schedule;
        $schedule->date = $request->date;
        $schedule->time =$request->time;
        $schedule->road_id = $request->road_id;



        $schedule->save();

        $seats= seat::all();
        foreach($seats as $seat){
            $busSeat= new bus_seat;
            $busSeat->schedule_id= $schedule->id;
            $busSeat->status_id= 1;
            $busSeat->seat_id= $seat->id;
            
            $busSeat->save();

        }

        return redirect(route('schedules.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schedule $schedule)
    {
        //
    }
    public function scheduleUpdate(Request $request)
    {
        
        $schedule =  schedule::find($request->id);
        $schedule->date = $request->date;
        $schedule->time =$request->time;
        $schedule->save();

        
        return redirect(route('schedules.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(schedule $schedule)
    {
        //
    }
}
