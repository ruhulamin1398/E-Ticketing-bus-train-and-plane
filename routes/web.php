<?php

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


Auth::routes();



Route::get('/', 'IndexController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('tickets', 'TicketController');

Route::resource('roads', 'RoadController')->middleware('auth');
Route::post('road-update', 'RoadController@roadUpdate')->name("road-update");

Route::resource('passengers', 'PassengerController')->middleware('auth');

Route::resource('schedules', 'ScheduleController')->middleware('auth');
Route::post('schedule-update', 'ScheduleController@scheduleUpdate')->name("schedule-update");


Route::resource('counters', 'CounterController')->middleware('auth');
Route::post('counter-update', 'CounterController@counterUpdate')->name("counter-update");

Route::resource('seats', 'SeatController');
Route::post('seat-update', 'SeatController@seatUpdate')->name("seat-update");

Route::resource('statuses', 'StatusController');
Route::post('status-update', 'StatusController@statusUpdate')->name("status-update");