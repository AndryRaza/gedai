<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beneficiaire extends Model
{
    protected $guarded = [];
    

    public function type_beneficiaire(){
        return $this->belongsTo('App\type_beneficiaire');
    }

    public function fiche(){
        return $this->hasOne('App\fiche');
    }
}
