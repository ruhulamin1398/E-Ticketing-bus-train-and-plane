<?php

namespace App\Http\Controllers;

use App\company;
use App\role;
use App\setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $settings = setting::where('table_name','users')->first();
        // $settings->setting= json_decode(  json_decode(  $settings->setting,true),true);
        // $dataArray=[
        //     'settings'=>$settings,
        //     'items' => User::all(),
        //     'companies' => company::all(),
        //     'roles' => role::all(),
        // ];
        $users = User::all();
        $companies = company::all();
        $roles = role::all();

        return view('superAdmin.user.index', compact('users','companies','roles'));
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
        $user =new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->company_id = $request->company_id;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->withSuccess(['Successfully Created']);
 


        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User  $user)
    {
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->withSuccess(['Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User  $user)
    {
        $user->delete();
        return Redirect::back()->withErrors(["Item Deleted" ]);
    }
}
