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
        "title":"Counter List",
        "editTitle":"Edit Counter"
    },
    "routes":{
        "create":{
            "name":"bus.bus-counters.store",
            "link":"bus/bus-counters"
        },
        "update":{
            "name":"bus.bus-counters.update",
            "link":"bus/bus-counters"
        },
        "delete":{
            "name":"bus.bus-counters.destroy",
            "link":"bus/bus-counters"
        }
    },
    "fieldList":[{
            
            "position":111,

            "create":"1",
            "read":"1",
            "update":"1",
            "require":"1",

           "input_type":"text",
           "name":"name",
           "title":"Name",


           "database_name":"name"
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
           "data" : "Companies"
        },{
            
            "position":115,

            "create":"1",
            "read":"1",
            "update":"1",
            "require":"1",

           "input_type":"dropDown",
           "name":"destination",
           "database_name":"destination_id",
           "title": "Destnation",
           "data" : "destination"
        }
    ]
}]' ;

        
        // $setting = setting::find(4);
        // $setting->setting = json_encode( $a);
        // $setting->table_name = 'bus_counters';
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
