<?php

use App\setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['TplCounter','auth'])->group(function () {

    Route::resource('tpl-schedule','TplScheduleController');
    Route::get('tpl-counter-all-tickets','TplCounterTicketController@index')->name('tpl-counter-all-tickets');
    Route::get('tpl-counter-new-ticket','TplCounterTicketController@create')->name('tpl-counter-new-ticket');
    Route::post('tpl-schedule-seat','TplScheduleSeatController@store')->name('tpl-schedule-seat');
});


Route::middleware(['TplAdmin','auth'])->group(function () {

    Route::resource('tpl','TplController');
    Route::resource('tpl-seats','TplSeatController');
});



//customer

 Route::get('tickets/{name}','TicketController@show')->name('tickets');
 Route::get('search','TicketController@search')->name('search');

//customer





Route::get('tpl-seat-api/{id}', 'TplController@tplSeats')->name('tpl-seat-api');
Route::get('tpl-seat-delete-api/{id}', 'TplSeatController@destroySeat')->name('tpl-seat-delete-api');
Route::get('tpl-schedule-seat', 'TplScheduleController@tplScheduleSeat')->name('tpl-schedule-seat');


Route::get('tpl-schedule-available-seat-list', 'TplScheduleController@tplScheduleAvailableSeatList')->name('tpl-schedule-available-seat-list');








Route::get('/', 'IndexController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Data table setting
 Route::resource('/setting','SettingController');

