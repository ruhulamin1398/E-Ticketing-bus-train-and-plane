<?php

namespace App\Http\Controllers;

use App\tplSchedule;
use App\tplScheduleSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TplScheduleSeatController extends Controller
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
        $seats = tplScheduleSeat::where('tpl_schedule_id',$request->tpl_schedule_id)->where('tpl_seat_id',$request->tpl_seat_id)->where('status_id',1)->take($request->tpl_total_seat)->get();

        $seats_name = '';

        foreach($seats as $seat){
            $seat->status_id= 3;
            $seat->customer_name= $request->name;
            $seat->customer_phone= $request->phone;
             $seats_name .= $seat->seat_name . ' , ';
            $seat->save();
        }

        $schedule = tplSchedule::find($request->tpl_schedule_id);
        $schedule->abasas();

        $ticket_info =new tplScheduleSeat;
        $ticket_info->customer_name = $request->name;
        $ticket_info->customer_phone = $request->phone;
        $ticket_info->schedule = $schedule->schedule;
        $ticket_info->from_destination = $schedule->from_destination;
        $ticket_info->to_destination = $schedule->to_destination;
        $ticket_info->seats_name = $seats_name;
        $ticket_info->company_name = Auth::user()->companies->name;

        return $ticket_info;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tplScheduleSeat  $tplScheduleSeat
     * @return \Illuminate\Http\Response
     */
    public function show(tplScheduleSeat $tplScheduleSeat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tplScheduleSeat  $tplScheduleSeat
     * @return \Illuminate\Http\Response
     */
    public function edit(tplScheduleSeat $tplScheduleSeat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tplScheduleSeat  $tplScheduleSeat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tplScheduleSeat $tplScheduleSeat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tplScheduleSeat  $tplScheduleSeat
     * @return \Illuminate\Http\Response
     */
    public function destroy(tplScheduleSeat $tplScheduleSeat)
    {
        //
    }
}
