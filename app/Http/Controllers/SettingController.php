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
        "title":" Vehicle List",
        "editTitle":"Edit Vehicle"
    },
    "routes":{
        "create":{
            "name":"tpl.store",
            "link":"tpl"
        },
        "update":{
            "name":"tpl.update",
            "link":"tpl"
        },
        "delete":{
            "name":"tpl.destroy",
            "link":"tpl"
        }
    },
    "fieldList":[{
            
        "position":1,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"text",
       "name":"name",
       "title":"Name",


       "database_name":"name"
    },{
            
        "position":2,

        "create":"0",
        "read":"1",
        "update":"0",
        "require":"0",

       "input_type":"dropDown",
       "name":"from_destination",
       "database_name":"from_destination_id",
       "title": "From",
       "data" : "from_destinations"
    },{
            
        "position":3,

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
            
        "position":4,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"number",
       "name":"distance",
       "title":"Distance (k.m.)",


       "database_name":"distance"
    },{
            
        "position":5,

        "create":"1",
        "read":"1",
        "update":"1",
        "require":"1",

       "input_type":"number",
       "name":"time",
       "title":"Time (h.m)",


       "database_name":"time"
    }
    ]
}]' ;

        
        // $setting = new setting;
        // $setting->setting = json_encode( $a);
        // $setting->table_name = 'tpls';
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
