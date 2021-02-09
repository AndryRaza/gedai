<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nature_acte extends Model
{
    protected $guarded =[];

    public function fiche(){
        return $this->hasOne('App\fiche');
    }

    
}
