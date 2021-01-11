<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tplSchedule extends Model
{
    
    protected $guarded = [];
    public function tpls(){
        return $this->belongsTo('App\tpl','tpl_id','id');
    }
    public function company(){
        return $this->belongsTo('App\company','company_id','id');
    }
    public function from(){
        return $this->belongsTo('App\destination','from_destination_id','id');
    }
    public function seats(){
        return $this->hasMany('App\tplScheduleSeat','tpl_schedule_id','id');
    }

    public function abasas(){
        $this->tpl = $this->tpls->name;
        $this->from_destination = $this->tpls->fromDestinations->name;
        $this->to_destination = $this->tpls->toDestinations->name;
    }  
}
