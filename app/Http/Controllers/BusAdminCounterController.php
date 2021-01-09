<?php

namespace App\Http\Controllers;

use App\busSchedule;
use Illuminate\Http\Request;

class BusAdminCounterController extends Controller
{
    public function index()
    {
        
        $schedules= busSchedule::all();
        return view('bus.counter.index',compact('schedules'));
    }
}
