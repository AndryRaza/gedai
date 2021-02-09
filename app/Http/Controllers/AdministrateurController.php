<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\sous_categorie;
use Illuminate\Support\Facades\DB;
use App\fiche;

class AdministrateurController extends Controller
{
    public function vide_temp()
    {
        File::deleteDirectory(public_path('storage/temp_pdf'));
        return redirect('/administration');
    }

    public function choix_cate($id)
    {

        $sous_categories = sous_categorie::where('categorie_id', '=', $id)->get();

        $tab_nbre = [];
        $tab_montant = [];
        foreach($sous_categories as $ss_categorie){
            $nb = fiche::where('sous_categorie_id','=',$ss_categorie->id)->count();
            $montant = fiche::where('sous_categorie_id','=',$ss_categorie->id)->sum('montant_aide');
            array_push($tab_nbre,$nb);
            array_push($tab_montant,$montant);
        }

        $res = [$sous_categories,$tab_nbre,$tab_montant];
      
        return $res;
    }
}
