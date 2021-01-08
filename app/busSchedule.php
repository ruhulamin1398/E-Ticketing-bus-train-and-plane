<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class busSchedule extends Model
{
    protected $guarded = [];

    public function companies(){
        return $this->belongsTo('App\company','company_id','id');
    }

    public function buses(){
        return $this->belongsTo('App\bus','bus_id','id');
    }
    public function destinations(){
        return $this->belongsTo('App\destination','to_destination_id','id');
    }

   


    public function abasas(){
        $this->company = $this->companies->name;
        $this->bus = $this->buses->name;
        $this->to_destination = $this->destinations->name;
    }  

}
