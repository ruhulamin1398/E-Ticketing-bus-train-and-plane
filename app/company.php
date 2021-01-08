<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{

    protected $guarded = [];
    public function companyType(){
        return $this->belongsTo('App\companyType','company_type_id','id');
    }



    public function abasas(){
        $this->company_type = $this->companyType->name;
    }  
}
