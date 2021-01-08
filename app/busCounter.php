<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class busCounter extends Model
{
    protected $guarded = [];


    public function destination(){
        return $this->belongsTo('App\destination','destination_id','id');
    }

    public function companies()
    {
       return $this->belongsTo('App\company','company_id','id');
    }

    public function abasas(){
        $this->company = $this->companies->name;
        $this->destination = $this->destination->name;
    }  

}
