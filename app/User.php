<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        //    Super Admin

    public function isSuperAdmin()
    {
        if (Auth::user()->role_id == 1) {
            return true;
        } else {
            return false;
        }
    }


        //    Bus
    public function isBusAdmin()
    {
        if (Auth::user()->role_id == 2) {
            return true;
        } else {

            return false;
        }
    }


    public function isBusCounter()
    {
        if (Auth::user()->role_id == 3) {
            return true;
        } else {

            return false;
        }
    }


        //   Train
    public function isTrainAdmin()
    {
        if (Auth::user()->role_id == 4) {
            return true;
        } else {

            return false;
        }
    }


    public function isTrainCounter()
    {
        if (Auth::user()->role_id == 5) {
            return true;
        } else {

            return false;
        }
    }


    //    Launch

    public function isLaunchAdmin()
    {
        if (Auth::user()->role_id == 6) {
            return true;
        } else {

            return false;
        }
    }


    public function isLaunchCounter()
    {
        if (Auth::user()->role_id == 7) {
            return true;
        } else {

            return false;
        }
    }




    //   Plane

    public function isPlaneAdmin()
    {
        if (Auth::user()->role_id == 8) {
            return true;
        } else {

            return false;
        }
    }


    public function isPlaneCounter()
    {
        if (Auth::user()->role_id == 9) {
            return true;
        } else {

            return false;
        }
    }


    public function isPassenger()
    {
        if (Auth::user()->role_id == 10) {
            return true;
        } else {

            return false;
        }
    }

    
    public function companies(){
        return $this->belongsTo('App\company','company_id','id');
    }
    public function roles(){
        return $this->belongsTo('App\role','role_id','id');
    }
 




}
