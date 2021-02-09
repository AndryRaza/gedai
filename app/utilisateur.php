<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class utilisateur extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $fillable = ['nom','prenom','role_id','service_id','email','mot_de_passe','telephone','etat'];
    //protected $guarded = []; //Pour indiquer quel champ ne doivent pas être rempli, c'est l'inverse de $fillable 
 /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function role(){
        return $this->belongsTo('App\role');
    }

    public function service(){
        return $this->belongsTo('App\service');
    }

    public function fiche(){
        return $this->hasOne('App\fiche');
    }

}
