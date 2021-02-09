<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_beneficiaire extends Model
{
    protected $guarded = [];

    public function beneficiaire(){
        return $this->hasOne('App\beneficiaire');
    }
}
