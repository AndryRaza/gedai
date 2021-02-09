<?php

use App\Http\Controllers\FicheController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Indian/Reunion');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('', 'ConnexionController@formulaire_utilisateur');
Route::post('', 'ConnexionController@traitement');
Route::get('/page_administration', 'ConnexionController@formulaire_administrateur');
Route::post('/page_administration', 'ConnexionController@traitement_administrateur');

Route::group(
    [
        'middleware' => 'App\Http\Middleware\Utilisateur',
    ],
    function () {

        Route::view('/exemple_mail','mails.message');
       /* Route::get('/exemple_pdf', function () {
            $data= App\fiche::all();
            return view('mails.pdf')->with('data', $data);
        });*/

        Route::get('/utilisateur', function () {
            $services = DB::table('services')->where('services.service','!=','')->get();
            return view('utilisateur')->with('services', $services);
        });

        Route::post('/utilisateur_service', 'UtilisateurController@maj_service');

        Route::get('/deconnexion', 'ConnexionController@deconnexion');

        Route::resource('fiches', 'FicheController');
        Route::get('fiches/desactivate/{id}', 'FicheController@desactivate');
        Route::get('/fiche-list', 'FicheController@ficheList');
        Route::get('/send_mail','FicheController@send_mail');

        Route::view('/choix_pdf', 'fiches.choix_pdf');
        Route::post('/store_pdf', 'FicheController@storepdf');

        Route::get('/create/selection/{id}', 'FicheController@selection');

        Route::resource('/mes-fiches','MesfichesController');
        Route::get('/mesfiches-list', 'MesfichesController@mesfichesList');
        Route::get('mes-fiches/desactivate/{id}', 'MesfichesController@desactivate');
        Route::get('mes-fiches/activate/{id}', 'MesfichesController@activate');
    }

);


Route::group(
    [
        'middleware' => 'App\Http\Middleware\Admin',
    ],
    function () {

        Route::resource('utilisateurs', 'UtilisateurController');
        Route::get('utilisateurs/desactivate/{id}', 'UtilisateurController@desactivate');
        Route::get('utilisateurs/activate/{id}', 'UtilisateurController@activate');
        Route::get('/utilisateur-list', 'UtilisateurController@utilisateurList');

        Route::get('/administration', function () {
            $categories = DB::table('categories')->where('etat','=','1')->get();
            $utilisateurs = DB::table('utilisateurs')->latest()->limit(5)->get();
            $fiches = DB::table('fiches')->latest()->limit(5)->get();
            return view('administration',compact('categories','utilisateurs','fiches'));
        });

        Route::get('/administration/stat/{id}', 'AdministrateurController@choix_cate');

        Route::get('/delete_tmp', 'AdministrateurController@vide_temp');

        Route::get('/deconnexion', 'ConnexionController@deconnexion');

        Route::resource('categories', 'CategorieController');
        Route::get('categories/desactivate/{id}', 'CategorieController@desactivate');
        Route::get('categories/activate/{id}', 'CategorieController@activate');
        Route::get('/categorie-list', 'CategorieController@categorieList');

        Route::resource('ss-categories', 'SSCategorieController');
        Route::get('ss-categories/desactivate/{id}', 'SSCategorieController@desactivate');
        Route::get('ss-categories/activate/{id}', 'SSCategorieController@activate');
        Route::get('/ss-categorie-list', 'SsCategorieController@sscategorieList');

        Route::resource('actes', 'ActeController');
        Route::get('actes/desactivate/{id}', 'ActeController@desactivate');
        Route::get('actes/activate/{id}', 'ActeController@activate');
        Route::get('/acte-list', 'ActeController@acteList');

        Route::resource('types_benef', 'TypeBenefController');
        Route::get('types_benef/desactivate/{id}', 'TypeBenefController@desactivate');
        Route::get('types_benef/activate/{id}', 'TypeBenefController@activate');
        Route::get('/type-list', 'TypeBenefController@typeList');

        Route::resource('beneficiaires', 'BeneficiaireController');
        Route::get('/beneficiaire-list', 'BeneficiaireController@beneficiaireList');
        Route::get('beneficiaires/desactivate/{id}', 'BeneficiaireController@desactivate');
        Route::get('beneficiaires/activate/{id}', 'BeneficiaireController@activate');

        Route::resource('fiches_admin','FichesAdminController');
        Route::get('/fiches_admin-list', 'FichesAdminController@fiches_adminList');
        Route::get('fiches_admin/desactivate/{id}', 'FichesAdminController@desactivate');
        Route::get('fiches_admin/activate/{id}', 'FichesAdminController@activate');

        Route::post('/store_pdf_admin', 'FichesAdminController@storepdf');
    }
);
