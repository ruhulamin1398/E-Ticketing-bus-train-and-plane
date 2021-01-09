<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tpl extends Model
{
    protected $guarded = [];

   
    public function fromDestinations(){
        return $this->belongsTo('App\destination','from_destination_id','id');
    }
    public function toDestinations(){
        return $this->belongsTo('App\destination','to_destination_id','id');
    }

    public function abasas(){
        $this->from_destination = $this->fromDestinations->name;
        $this->to_destination = $this->toDestinations->name;

    }  

}
