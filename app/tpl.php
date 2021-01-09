<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tpl extends Model
{
    protected $guarded = [];
    public function companyType(){
        return $this->belongsTo('App\companyType','company_type_id','id');
    }

   
    public function fromDestinations(){
        return $this->belongsTo('App\destination','from_destination_id','id');
    }

    public function abasas(){
        $this->types = $this->companyType->name;
        $this->from_destination = $this->fromDestinations->name;

    }  

}
