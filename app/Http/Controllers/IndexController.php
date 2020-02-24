<?php

namespace App\Http\Controllers;

use App\road;
use App\schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
       
        $roads= road::all();
        $schedules= schedule::all();
        return view('index',compact('schedules','roads'));
    }
}
