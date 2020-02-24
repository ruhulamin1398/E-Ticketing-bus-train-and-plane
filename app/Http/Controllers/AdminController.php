<?php

namespace App\Http\Controllers;

use App\road;
use App\schedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    



    public function index()
    {
        $roads= road::all();
        $schedules= schedule::all();
        return view('admin',compact('schedules','roads'));
    }



    
}
