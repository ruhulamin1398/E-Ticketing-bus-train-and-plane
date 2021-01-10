<?php

namespace App\Http\Controllers;

use App\busCounter;
use App\busSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusAdminCounterController extends Controller
{
    public function index()
    {
        
        $counter_id = Auth::user()->counter_id;
        $counter = busCounter::find($counter_id);
        $destination_id = $counter->destination_id;
        
        $schedules= busSchedule::where('from_destination_id',$destination_id)->where('company_id',Auth::user()->company_id)->where("schedule",">",now())->get();
        return view('bus.counter.index',compact('schedules'));
    }
}
