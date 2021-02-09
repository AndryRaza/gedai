<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $guarded = [];

    public function sous_categorie(){
        return $this->hasOne('App\sous_categorie');
    }

    public function fiche(){
        return $this->hasOne('App\fiche');
    }
}
