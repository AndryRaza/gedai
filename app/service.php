<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public function utilisateur(){
        return $this->hasOne('App\utilisateur');
    }

    public function fiche(){
        return $this->hasOne('App\fiche');
    }

    
}
