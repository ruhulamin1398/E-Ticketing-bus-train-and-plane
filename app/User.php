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


    public function isSuperAdmin()
    {
        if (Auth::user()->role_id == 1) {
            return true;
        } else {
            return false;
        }
    }



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
}
