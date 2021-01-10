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
})->name("busIndex"); 

Route::resource('/buses','BusController');
Route::resource('/bus-counters','BusCounterController');


Route::resource('/bus-schedules','BusScheduleController');

Route::get('bus-counter-admin', 'BusAdminCounterController@index')->name('busCounterAdmin');

Route::get('bus-schedule-seat', 'BusScheduleController@busScheduleSeat')->name('bus-schedule-seat');
//// Api routes

Route::get('road-schedule-api', 'RoadController@roadScheduleApi')->name('road-schedule-api');
Route::get('seat-schedule-api', 'ScheduleController@seatScheduleApi')->name('seat-schedule-api');
Route::get('road-view-api', 'RoadController@roadViewApi')->name('road-view-api');
Route::get('schedule-passenger-api', 'ScheduleController@schedulePassengerApi')->name('schedule-passenger-api');