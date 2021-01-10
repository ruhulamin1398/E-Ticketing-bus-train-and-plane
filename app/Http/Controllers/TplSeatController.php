<?php

namespace App\Http\Controllers;

use App\company;
use App\tpl;
use App\tplSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TplSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->company_id;
        $tpls = tpl::where('company_id',$company_id)->get();
        

        return view('tpl.seat.index',compact('tpls'));


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
        $tplSeat = new tplSeat;
        $tplSeat->tpl_id = $request->tpl_id;
        $tplSeat->seat_type = $request->seat_type;
        $tplSeat->total_seat = $request->total_seat;
        $tplSeat->cost = $request->cost;
        $tplSeat->save();
        return $tplSeat;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tplSeat  $tplSeat
     * @return \Illuminate\Http\Response
     */
    public function show(tplSeat $tplSeat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tplSeat  $tplSeat
     * @return \Illuminate\Http\Response
     */
    public function edit(tplSeat $tplSeat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tplSeat  $tplSeat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tplSeat $tplSeat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tplSeat  $tplSeat
     * @return \Illuminate\Http\Response
     */
    public function destroy(tplSeat $tplSeat)
    {
        $tplSeat->delete();
        return;
    }


    public function destroySeat($id)
    {
        $tplSeat = tplSeat::find($id);
        $tplSeat->delete();
        return;
    }
}
