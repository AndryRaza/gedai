<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function utilisateur(){
        return $this->hasOne('App\utilisateur');
    }
}
