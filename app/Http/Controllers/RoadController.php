<?php

namespace App\Http\Controllers;

use App\counter;
use App\road;
use Illuminate\Http\Request;

class RoadController extends Controller
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
        return view('roads', compact('roads','counters'));
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
        $road = new road;
        $road->from_counter_id= $request->from_counter_id;
        $road->to_counter_id= $request->to_counter_id;
        $road->distance= $request->distance;
        $road->cost= $request->cost;
        $road->save();

        return redirect(route('roads.index'));

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\road  $road
     * @return \Illuminate\Http\Response
     */
    public function show(road $road)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\road  $road
     * @return \Illuminate\Http\Response
     */
    public function edit(road $road)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\road  $road
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, road $road)
    {
        //
    }
    public function roadUpdate( Request $request){

        $road= road::find($request->id);
        $road->name= $request->name;

        $road->description= $request->description;
        $road->save();



        return redirect(route('roads.index'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\road  $road
     * @return \Illuminate\Http\Response
     */
    public function destroy(road $road)
    {
        $road->delete();

        return redirect(route('roads.index'));
    }




    public function roadScheduleApi(Request $request)
    {
       return  road::find($request->id)->schedules->where('date_time',">",now());

        
    }

    public function roadViewApi(Request $request)
    {
       return  road::find($request->id);

        
    }


 
}
