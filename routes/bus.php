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


Route::middleware(['BusAdmin'])->group(function () {
    Route::resource('/bus-counters','BusCounterController');
     Route::resource('/buses','BusController');
});



Route::middleware(['BusCounter'])->group(function () {

    Route::get('bus-counter-new-ticket', 'BusCounterTicketController@index')->name('busCounterNewTicket');
    Route::get('bus-counter-tickets', 'BusAdminCounterController@index')->name('busCounterTickets');
    Route::resource('/bus-schedules','BusScheduleController');



});

// Api Route
Route::get('bus-schedule-seat', 'BusScheduleController@busScheduleSeat')->name('bus-schedule-seat');
//// Api routes
