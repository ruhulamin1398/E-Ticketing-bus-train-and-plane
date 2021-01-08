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
        "title":"Destination List",
        "editTitle":"Edit Destination"
    },
    "routes":{
        "create":{
            "name":"superAdmin.destinations.store",
            "link":"super-admin/destinations"
        },
        "update":{
            "name":"superAdmin.destinations.update",
            "link":"super-admin/destinations"
        },
        "delete":{
            "name":"superAdmin.destinations.destroy",
            "link":"super-admin/destinations"
        }
    },
    "fieldList":[{
        
            "position":11,

            "create":"2",
            "read":"1",
            "update":"2",
            "require":"1",

            "name":"name",
            "input_type" : "text",
            "database_name":"name",  
            "title":"Name"
        },{
            
            "position":111,

            "create":"2",
            "read":"1",
            "update":"2",
            "require":"0",

           "input_type":"text",
           "name":"description",
           "title":"Description",


           "database_name":"description"
        }
    ]
}]' ;


        
        // $setting =new setting;
        // $setting->setting = json_encode( $a);
        // $setting->table_name = 'destinations';
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
