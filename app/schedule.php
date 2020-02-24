<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public function road()
    {
        return $this->hasOne('App\road','id','road_id');
    }
    public function seats()
    {
        
        return $this->hasMany('App\bus_seat', 'schedule_id', 'id');
    }
}
