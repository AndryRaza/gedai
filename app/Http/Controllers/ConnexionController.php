<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\service;
use Illuminate\Support\Facades\flash;
use Illuminate\Support\Facades\Log;

class ConnexionController extends Controller
{
    public function formulaire_utilisateur()
    {
        return view('welcome');
    }

    public function traitement()
    {

        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result =  AUTH::attempt([
            'email' => request('email'),
            'password' => request('password'),
            'role_id'=> 1,
            'etat'=>1
        ]);

        if ($result) {
            flash('Connexion réussie');
            Log::warning(auth()->user()->nom . ' '. auth()->user()->prenom . ' s\'est connecté');
            return redirect('/utilisateur');
        } else {
            flash('Connexion échouée')->error();
            return redirect('');
        }

    }

    public function formulaire_administrateur()
    {
        return view('connexion_admin');
    }

    public function traitement_administrateur()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);



        $result =  AUTH::attempt([
            'email' => request('email'),
            'password' => request('password'),
            'role_id'=> 0,
            'etat'=>1
        ]);



        if ($result) {
            flash('Connexion réussie');
            Log::warning('L\'admin s\'est connecté');
            return redirect('/administration');
        } else {
            flash('Connexion échouée')->error();
            return redirect('/page_administration');
        }
    }

    public function deconnexion(){
        Log::warning('L\'utilisateur '. auth()->user()->nom .' '.auth()->user()->prenom . ' s\'est déconnecté');
        auth::logout();
        return redirect('');
    }
}
