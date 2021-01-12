<?php

namespace App\Http\Controllers;

use App\busSchedule;
use App\companyType;
use App\destination;
use App\tplSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 'bus') {
            $company_type = companyType::find(1);
        } elseif ($id == 'train') {
            $company_type = companyType::find(2);
        } elseif ($id == 'plane') {
            $company_type = companyType::find(4);
        } elseif ($id == 'launch') {
            $company_type = companyType::find(3);
        } else {
            return abort(404);
        }
        $destinations = destination::all();
        return view('customer.index', compact('destinations', 'company_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        $company_type_id = $request->company_type_id;
        $to_destination_id = $request->to_destination_id;
        if ($company_type_id == "1") {
            $time_start = $request->date . ' 00:00:00';
            $time_end = $request->date . ' 23:59:59';
            $bus_schedules  = busSchedule::where('from_destination_id', $request->from_destination_id)->where('to_destination_id', $to_destination_id)->where('schedule', '<=', $time_end)->where('schedule', '>=', $time_start)->get();

            foreach($bus_schedules as $schedule){
                 $schedule->available = $schedule->seats->where('status_id',1)->count();
            }

            return view('customer.search.bus', compact('company_type_id', 'bus_schedules'));
        }
        elseif ($company_type_id == "2" || $company_type_id == "3" || $company_type_id == "4") {
            $time_start = $request->date . ' 00:00:00';
            $time_end = $request->date . ' 23:59:59';
           
            $tpl_schedules = tplSchedule::where('company_type_id',$company_type_id)->where('from_destination_id', $request->from_destination_id)->where('schedule', '<=', $time_end)->where('schedule', '>=', $time_start)->get();
   
            return view('customer.search.tpl',compact('tpl_schedules','company_type_id','to_destination_id'));
        }
        else{
            return abort(404);
        }
    }
    public function bookTicket(Request $request)
    {
        if($request->company_type_id ==1){
            $schedule= busSchedule::find($request->schedule_id);
            if(is_null($schedule)){
                return abort(404);
            }
            return view('customer.bookTicket.bus',compact('schedule'));
        }
        elseif($request->company_type_id > 1 && $request->company_type_id <=4 ){
            $schedule= tplSchedule::find($request->schedule_id);
            if(is_null($schedule)){
                return abort(404);
            }
            $schedule->abasas();
            return view('customer.bookTicket.tpl',compact('schedule'));
        }
        else{
            return abort(404);
        }
    }
}
