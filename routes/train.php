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
    return view('train.admin.index');
}); 


Route::middleware(['web'])->group(function () {
    //
});



Route::resource('tpl','TplController');
Route::resource('tpl-schedule','TplScheduleController');
Route::resource('tpl-seats','TplSeatController');
Route::resource('tpl-counter-all-ticket','TplCounterTicketController');