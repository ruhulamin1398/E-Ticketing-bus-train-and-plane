<?php

namespace App\Http\Controllers;

use App\companyType;
use App\destination;
use App\setting;
use App\tpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = setting::where('table_name','tpls')->first();
        $destination_id = Auth::user()->counter_id;
        $settings->setting= json_decode(  json_decode(  $settings->setting,true),true);
        $dataArray=[
            'settings'=>$settings,
            'items' => tpl::all(),
            'to_destinations' => destination::where('id','!=',$destination_id)->get(),
            'types' => companyType::all(),

        ];

        return view('tpl.index', compact('dataArray'));
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
        $tpl 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tpl  $tpl
     * @return \Illuminate\Http\Response
     */
    public function show(tpl $tpl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tpl  $tpl
     * @return \Illuminate\Http\Response
     */
    public function edit(tpl $tpl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tpl  $tpl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tpl $tpl)
    {
        $tpl->update($request->all());
        return redirect()->back()->withSuccess(['Successfully Updated']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tpl  $tpl
     * @return \Illuminate\Http\Response
     */
    public function destroy(tpl $tpl)
    {
        $tpl->delete();
        return Redirect::back()->withErrors(["Item Deleted" ]);
    }
}
