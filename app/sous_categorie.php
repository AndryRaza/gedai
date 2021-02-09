<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sous_categorie extends Model
{
    protected $guarded=[];

    public function categorie(){
        return $this->belongsTo('App\categorie');
    }

    public function fiche(){
        return $this->hasOne('App\fiche');
    }
}
