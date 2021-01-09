<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/', function () {
    return view('bus.admin.includes.app');
}); 

Route::resource('/buses','BusController');
Route::resource('/bus-counters','BusCounterController');


Route::resource('/bus-schedules','BusScheduleController');