<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    public function bus_seat()
    {
        return $this->hasOne('App\bus_seat','id','bus_seat_id');
    }
  
    public function schedule()
    {
        return $this->belongsTo('App\schedule');
    }
}
