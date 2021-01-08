<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus extends Model
{

    protected $guarded = [];
    public function companies()
    {


        return $this->belongsTo('App\company','company_id','id');
    }

    public function abasas(){
        $this->company_id = $this->companies->name;
    }  

}
