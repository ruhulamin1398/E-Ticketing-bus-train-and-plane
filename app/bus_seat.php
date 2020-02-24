<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus_seat extends Model
{
    public function status()
    {
        return $this->hasOne('App\status','id','status_id');
        
    }
}
