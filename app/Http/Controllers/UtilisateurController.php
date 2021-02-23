<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;
use App\role;
use App\Service;
use Auth;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('utilisateurs.utilisateurs');
    }
    public function utilisateurList(Request $request)
    {
            $utilisateurs = DB::table('utilisateurs')

                    ->select('utilisateurs.id','utilisateurs.created_at','utilisateurs.updated_at','roles.role','services.service','utilisateurs.nom',
                    'utilisateurs.prenom','utilisateurs.email','utilisateurs.telephone','utilisateurs.etat')
                    ->join('roles','utilisateurs.role_id','=','roles.id')
                    ->join('services','utilisateurs.service_id','=','services.id')
                    ->get();

        
            return datatables()->of($utilisateurs)
            ->addColumn('voir', function ($row) {
                $btn = '<a href="/utilisateurs/' . $row->id . '" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
              </svg> </a>    ';
                return $btn;
            })
            ->addColumn('modifier',function($row){
                $btn = '<a href="/utilisateurs/'.$row->id.'/edit"  class="btn btn-primary text-center"> Modifier </a> ';
                return $btn; 

            })
            ->addColumn('désactiver',function($row){
                if ($row->etat == 1)
                {  $btn = '<a href="utilisateurs/desactivate/' . $row->id . '"  class="btn btn-danger"> Désactiver </a>';}
                else  {  $btn = '<a href="utilisateurs/activate/' . $row->id . '"  class="btn btn-success"> Activer </a>';}
                  return $btn;
            })
          
            ->rawColumns(['voir','modifier','désactiver'])
            ->editColumn('role_id',function($user){
                return $user->role;
            })
            ->editColumn('service_id',function($user){
                if ($user->service === '') return 'Pas affecté';
                else{
                return $user->service;
                }
            })
            ->editColumn('etat',function($sscat){
                if ($sscat->etat === 1){
                    return 'Actif';
                }else {return 'Inactif';}
            })
            ->make(true);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $roles = role::where('etat',1)->get();
        $services = service::where('etat',1)->get();
        return view('utilisateurs.create',compact('roles','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required|min:3|max:255|regex:/^[A-Za-z]+$/',
            'prenom'=>'required|min:3|max:255|regex:/^[A-Za-z]+$/',
            'role'=>'required|integer',
            'email'=>'required|email',
            'mdp'=>'required',
            'telephone'=>'regex:/^[0-9]{9}$/',
            'etat'=>'required|integer',
        ]);
  
        
        $utilisateur = new utilisateur([
            'role_id'=>$request->get('role'),
            'service_id'=>0,
            'nom'=>$request->get('nom'),
            'prenom'=>$request->get('prenom'),
            'email'=>$request->get('email'),
            'mot_de_passe'=>password_hash($request->get('mdp'),PASSWORD_BCRYPT),
            'telephone'=>$request->get('telephone'),
            'etat'=>$request->get('etat')
        ]);
    
        $utilisateur->save();
        
        Log::info('L\'utilisateur '.$utilisateur->nom . ' ' . $utilisateur->prenom . ' a été créé.');

        flash('Utilisateur ajouté');
        return redirect('/utilisateurs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilisateur = utilisateur::find($id);
        $fiches = DB::table('fiches')
            ->select('fiches.id','beneficiaires.nom','beneficiaires.prenom','fiches.created_at','fiches.updated_at')
            ->join('beneficiaires','beneficiaires.id','=','fiches.beneficiaire_id')
            ->where('fiches.utilisateur_id','=',$id)
            ->get();
        return view('utilisateurs.show',compact('utilisateur','fiches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateur = utilisateur::find($id);
        $roles = role::where('etat',1)->get();
        $services = service::where('etat',1)->get();
        return view('utilisateurs.edit',compact('utilisateur','roles','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $utilisateur = utilisateur::find($id);

        if (Hash::check($request->get('mdp'),$utilisateur->mot_de_passe))   
        {
            flash('Mot de passe incorrect')->error();
            return back();
        } 

        $request->validate([
            'nom'=>'required|min:3|max:255|regex:/^[A-Za-z]+$/',
            'prenom'=>'required|min:3|max:255|regex:/^[A-Za-z]+$/',
            'role'=>'required|integer',
            'service'=>'required|integer',
            'email'=>'required|email',
            'mdp'=>'required',
            'telephone'=>'regex:/^[0-9]{9}$/',
            'etat'=>'required|integer',
        ]);
            
        $utilisateur->nom = $request->get('nom');
        $utilisateur->prenom = $request->get('prenom');
        $utilisateur->role_id = $request->get('role');
        $utilisateur->service_id = $request->get('service');
        $utilisateur->email = $request->get('email');
        $utilisateur->mot_de_passe = password_hash($request->get('mdp'),PASSWORD_BCRYPT);
        $utilisateur->telephone = $request->get('telephone');
        $utilisateur->etat = $request->get('etat');

        $utilisateur->save();

        flash('Utilisateur '.$utilisateur->nom.' modifié.');
        Log::info('L\'utilisateur '.$utilisateur->nom . ' ' . $utilisateur->prenom . ' a été modifié.');
        return redirect('/utilisateurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilisateur = utilisateur::find($id);
        $utilisateur->delete();

        return redirect('/utilisateurs');
    }

    public function desactivate($id){

        $utilisateur = utilisateur::find($id);
        $utilisateur->etat = 0; 

        $utilisateur->save();

        Log::info('L\'utilisateur '.$utilisateur->nom . ' ' . $utilisateur->prenom . ' a été désactivé.');

        return redirect('/utilisateurs');
    }
    
    public function activate($id){

        $utilisateur = utilisateur::find($id);
        $utilisateur->etat = 1; 

        $utilisateur->save();
        Log::info('L\'utilisateur '.$utilisateur->nom . ' ' . $utilisateur->prenom . ' a été activé.');

        return redirect('/utilisateurs');
    }

    public function maj_service(Request $request){

        $id = auth()->user()->id;
        $utilisateur = utilisateur::find($id);
        
        $request->validate([
            'services' => 'required'
        ]);

        $utilisateur->service_id = $request->get('services');

        $utilisateur->save();
        return redirect('fiches');
    }
}
