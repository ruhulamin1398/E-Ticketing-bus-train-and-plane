<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    public function road()
    {
        return $this->hasOne('App\bus_seat','id','bus_seat_id');
    }
}
