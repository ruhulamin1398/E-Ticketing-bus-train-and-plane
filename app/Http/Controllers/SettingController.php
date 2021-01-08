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
        "title":"Company List",
        "editTitle":"Edit Company"
    },
    "routes":{
        "create":{
            "name":"superAdmin.companies.store",
            "link":"super-admin/companies"
        },
        "update":{
            "name":"superAdmin.companies.update",
            "link":"super-admin/companies"
        },
        "delete":{
            "name":"superAdmin.companies.destroy",
            "link":"super-admin/companies"
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
        },
        {
            
            "position":3,

            "create":"2",
            "read":"1",
            "update":"2",
            "require":"1",

           "input_type":"dropDown",
           "name":"company_type",
           "database_name":"company_type_id",
           "title": "Company Type",
           "data" : "company_types"
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


        
        // $setting = setting::find(1);
        // $setting->setting = json_encode( $a);
        // $setting->table_name = 'companies';
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
