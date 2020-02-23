<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public function road()
    {
        return $this->hasOne('App\road','id','road_id');
    }
}
