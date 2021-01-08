<?php

namespace App\Http\Controllers;

use App\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
  
$a = '[{
    "componentDetails":{
        "title":"Bus schedule List",
        "editTitle":"Edit Bus schedule"
    },
    "routes":{
        "create":{
            "name":"bus.bus-schedules.store",
            "link":"bus/bus-schedules"
        },
        "update":{
            "name":"bus.bus-schedules.update",
            "link":"bus/bus-schedules"
        },
        "delete":{
            "name":"bus.bus-schedules.destroy",
            "link":"bus/bus-schedules"
        }
    },
    "fieldList":[{
            
        "position":112,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"dropDown",
       "name":"bus",
       "database_name":"bus_id",
       "title": "Bus",
       "data" : "buses"
    },{
            
        "position":112,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"dropDown",
       "name":"to_destination",
       "database_name":"to_destination_id",
       "title": "To",
       "data" : "to_destinations"
    },{
            
        "position":112,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"dropDown",
       "name":"company",
       "database_name":"company_id",
       "title": "Company",
       "data" : "companies"
    },{
            
        "position":111,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"number",
       "name":"distance",
       "title":"Distance (k.m.)",


       "database_name":"distance"
    },{
            
        "position":111,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"number",
       "name":"time",
       "title":"Time (h.m)",


       "database_name":"time"
    },{
            
        "position":111,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"number",
       "name":"cost",
       "title":"Cost",


       "database_name":"cost"
    },{
            
        "position":111,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"datetime-local",
       "name":"schedule",
       "title":"Schedule",


       "database_name":"schedule"
    }
    ]
}]' ;

        
        $setting = new setting;
        $setting->setting = json_encode( $a);
        $setting->table_name = 'bus_schedules';
        $setting->save();
        return  "Success";
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
