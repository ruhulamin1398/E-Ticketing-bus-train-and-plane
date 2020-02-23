<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class road extends Model
{
    
    
    public function from()
    {
        return $this->hasOne('App\counter','id','from_counter_id');
    } 
    public function to()
    {
        return $this->hasOne('App\counter','id','to_counter_id');
    }

}
