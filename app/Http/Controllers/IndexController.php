<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::check()) {

            return redirect(route('login'));
        } else {

            if (Auth::user()->isSuperAdmin()) {

                return redirect(route('superAdmin.superAdminIndex'));

            } elseif (Auth::user()->isBusAdmin()) {

                return redirect(route('bus.buses.index'));

            } elseif (Auth::user()->isBusCounter()) {

                return redirect(route('bus.busCounterNewTicket'));

            } elseif (Auth::user()->isTrainAdmin()) {

                return redirect(route('tpl.index'));

            } elseif (Auth::user()->isTrainCounter()) {

                return redirect(route('tpl-counter-new-ticket'));

            }elseif (Auth::user()->isLaunchAdmin()) {

                return redirect(route('tpl.index'));

            } elseif (Auth::user()->isLaunchCounter()) {

                return redirect(route('tpl-counter-new-ticket'));

            } elseif (Auth::user()->isPlaneAdmin()) {

                return redirect(route('tpl.index'));

            } elseif (Auth::user()->isPlaneCounter()) {

                return redirect(route('tpl-counter-new-ticket'));
            }
            elseif (Auth::user()->isTplAdmin()) {

                return redirect(route('tpl.index'));
            }
            elseif (Auth::user()->isTplCounter()) {

                return redirect(route('tpl-counter-new-ticket'));
            }else{
                return redirect('login');
            }


        }

        //  return Auth::user()->role_id;


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
