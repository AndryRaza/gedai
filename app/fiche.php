<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fiche extends Model
{
    protected $guarded = [];

    public function categorie(){
        return $this->belongsTo('App\categorie');
    }

    public function sous_categorie(){
        return $this->belongsTo('App\sous_categorie');
    }

    public function beneficiaire(){
        return $this->belongsTo('App\beneficiaire');
    }

    public function nature_acte(){
        return $this->belongsTo('App\nature_acte');
    }

    public function service(){
        return $this->belongsTo('App\service');
    }

    public function utilisateur(){
        return $this->belongsTo('App\utilisateur');
    }
}
