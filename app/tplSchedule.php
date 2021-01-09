<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tplSchedule extends Model
{
    
    protected $guarded = [];
    public function tpls(){
        return $this->belongsTo('App\tpl','tpl_id','id');
    }

    public function abasas(){
        $this->tpl = $this->tpls->name;
        $this->from_destination = $this->tpls->fromDestinations->name;
        $this->to_destination = $this->tpls->toDestinations->name;
    }  
}
