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
        "title":" Schedule List",
        "editTitle":"Edit Schedule"
    },
    "routes":{
        "create":{
            "name":"tpl-schedule.store",
            "link":"tpl-schedule"
        },
        "update":{
            "name":"ttpl-schedulepl.update",
            "link":"tpl-schedule"
        },
        "delete":{
            "name":"tpl-schedule.destroy",
            "link":"tpl-schedule"
        }
    },
    "fieldList":[{
            
        "position":2,

        "create":"0",
        "read":"1",
        "update":"0",
        "require":"0",

       "input_type":"dropDown",
       "name":"tpl",
       "database_name":"tpl_id",
       "title": "Vehicle",
       "data" : "tpls"
    },{
            
        "position":5,

        "create":"0",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"datetime-local",
       "name":"schedule",
       "title":"Schedule",


       "database_name":"schedule"
    },{
            
        "position":5,

        "create":"0",
        "read":"1",
        "update":"0",
        "require":"0",

       "input_type":"text",
       "name":"from_destination",
       "title":"From",


       "database_name":"from_destination_id"
    },{
            
        "position":5,

        "create":"0",
        "read":"1",
        "update":"0",
        "require":"0",

       "input_type":"text",
       "name":"to_destination",
       "title":"To",


       "database_name":"to_destination_id"
    }
    ]
}]' ;

        
        // $setting = new setting;
        // $setting->setting = json_encode( $a);
        // $setting->table_name = 'tpl_schedules';
        // $setting->save();
        // return  "Success";
    
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
