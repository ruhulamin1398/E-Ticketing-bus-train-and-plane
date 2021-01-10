<?php

namespace App\Http\Controllers;

use App\busCounter;
use App\company;
use App\setting;
use App\tpl;
use App\tplSchedule;
use App\tplScheduleSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\LinesOfCode\Counter;

class TplScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter_id = Auth::user()->counter_id;
        $counter = busCounter::find($counter_id);
        $destination_id = $counter->destination_id;
        $company_id = Auth::user()->company_id;
        $schedules=  tplSchedule::where('company_id',$company_id)->where('from_destination_id',$destination_id)->get();
        $tpls = tpl::where('company_id',$company_id)->where('from_destination_id',$destination_id)->get();


        $settings = setting::where('table_name','tpl_schedules')->first();
        $settings->setting= json_decode(  json_decode(  $settings->setting,true),true);
        $dataArray=[
            'settings'=>$settings,
            'items' =>$schedules,
            'tpls' => $tpls,
        ];

        return view('tpl.schedule.index', compact('dataArray','schedules','tpls'));
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
        $schedule = new tplSchedule;
        $schedule->tpl_id = $request->tpl_id;
        $schedule->schedule = $request->schedule;

        $schedule->counter_id = Auth::user()->counter_id;
        $schedule->company_id = Auth::user()->company_id;
        $counter = busCounter::find($schedule->counter_id);
        $destination_id = $counter->destination_id;

        $company = company::find($schedule->company_id);
        $company_type_id = $company->company_type_id;
        $schedule->company_type_id = $company_type_id;
        $schedule->from_destination_id = $destination_id;
        $schedule->save();



        $tpl = tpl::find($schedule->tpl_id);
        $tplSeats = $tpl->seats;
        foreach ($tplSeats as $tplseat) {
            for($i=1;$i<=$tplseat->total_seat;$i++)
            {
                $seat = new tplScheduleSeat;
                $seat->tpl_schedule_id = $schedule->id;
                $seat->tpl_seat_id = $tplseat->id;

                $seat->seat_name = $tplseat->seat_type.$i;
                $seat->status_id = 1;
                $seat->save();

            }
        }
        

        return redirect()->back()->withSuccess(['Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tplSchedule  $tplSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(tplSchedule $tplSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tplSchedule  $tplSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(tplSchedule $tplSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tplSchedule  $tplSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tplSchedule $tplSchedule)
    {
        $tplSchedule->update($request->all());
        return redirect()->back()->withSuccess(['Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tplSchedule  $tplSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(tplSchedule $tplSchedule)
    {
        $tplSchedule->delete();
        return Redirect::back()->withErrors(["Item Deleted" ]);
    }
}
