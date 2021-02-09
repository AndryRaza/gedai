<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beneficiaire;
use App\type_beneficiaire;
use DataTables;
use Illuminate\Support\Facades\DB;

class BeneficiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('beneficiaires.index');
    }

    public function beneficiaireList(Request $request)
    {
            $beneficiaires = DB::table('beneficiaires')

                    ->select('beneficiaires.id','beneficiaires.created_at','beneficiaires.updated_at',
                    'type_beneficiaires.type','beneficiaires.nom','beneficiaires.prenom',
                    'beneficiaires.organisme','beneficiaires.adresse','beneficiaires.tel_fixe',
                    'beneficiaires.tel_mobile','beneficiaires.email','beneficiaires.etat')
                    ->join('type_beneficiaires','beneficiaires.type_beneficiaire_id','=','type_beneficiaires.id')
                    ->get();

          

            return datatables()->of($beneficiaires)
            ->addColumn('voir', function ($row) {
                $btn = '<a href="/beneficiaires/' . $row->id . '" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
              </svg> </a>    ';
                return $btn;
            })

            ->addColumn('modifier',function($row){
                $btn = '<a href="/beneficiaires/'.$row->id.'/edit"  class="btn btn-primary text-center"> Modifier </a>    ';
                return $btn; 

            })
            ->addColumn('désactiver',function($row){
                if ($row->etat == 1)
              {  $btn = '<a href="beneficiaires/desactivate/' . $row->id . '"  class="btn btn-danger"> Désactiver </a>';}
              else  {  $btn = '<a href="beneficiaires/activate/' . $row->id . '"  class="btn btn-success"> Activer </a>';}
                return $btn;

            })
          
            ->rawColumns(['voir','modifier','désactiver'])
            ->editColumn('type_beneficiaire_id',function($user){
                return $user->type;
            })
            ->editColumn('etat',function($sscat){
                if ($sscat->etat === '1'){
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
        $types = type_beneficiaire::all();
        return view('beneficiaires.create',compact('types'));
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
            'type_benef'=>'required|integer',
            'organisme'=>'required|min:3|max:255|regex:/^[A-Za-z é è \' . -]+$/',
            'adresse'=>'required|min:3|max:255|regex:/^[A-Za-z0-9 é è \' . ,]+$/',
            'tel_fixe'=>'integer|nullable',
            'tel_mobile'=>'integer|nullable',
            'email'=>'required|email',

            'etat'=>'required|integer'
        ]);

        $tel_fixe = $request->get('tel_fixe')== NULL ? 0000 : $request->get('tel_fixe');
        $tel_mobile = $request->get('tel_mobile')== NULL ? 0000 : $request->get('tel_mobile');

        $new_benef = new beneficiaire([
            'nom'=> $request->get('nom'),
            'prenom'=> $request->get('prenom'),
            'type_beneficiaire_id'=> $request->get('type_benef'),
            'organisme'=> $request->get('organisme'),
            'adresse'=> $request->get('adresse'),
            'tel_fixe'=> $tel_fixe,
            'tel_mobile'=>$tel_mobile,
            'email'=> $request->get('email'),
            'etat'=>$request->get('etat')
        ]);

        $new_benef->save();

        flash('Bénéficiaire ajouté.');
        return redirect('beneficiaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beneficiaire = beneficiaire::find($id);
        $fiches = DB::table('fiches')
        ->select('fiches.created_at','fiches.id','utilisateurs.nom','utilisateurs.prenom')
        ->join('utilisateurs', 'utilisateurs.id', '=', 'fiches.utilisateur_id')
        ->where('beneficiaire_id','=',$id)->get();

        return view('beneficiaires.show',compact('beneficiaire','fiches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beneficiaire = beneficiaire::find($id);
        $types = type_beneficiaire::all();
        return view('beneficiaires.edit',compact('beneficiaire','types'));
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
        $request->validate([
            'nom'=>'required|min:3|max:255|regex:/^[A-Za-z]+$/',
            'prenom'=>'required|min:3|max:255|regex:/^[A-Za-z]+$/',
            'type_benef'=>'required|integer',
            'organisme'=>'required|min:3|max:255|regex:/^[A-Za-z é è \' . -]+$/',
            'adresse'=>'required|min:3|max:255|regex:/^[A-Za-z0-9 é è \' . ,]+$/',
            'tel_fixe'=>'required|integer',
            'tel_mobile'=>'required|integer',
            'email'=>'required|email',
      
            'etat'=>'required|integer'
        ]);

        $benef = beneficiaire::find($id);
        $benef->nom = $request->get('nom');
        $benef->prenom = $request->get('prenom');
        $benef->type_beneficiaire_id = $request->get('type_benef');
        $benef->organisme = $request->get('organisme');
        $benef->adresse = $request->get('adresse');
        $benef->tel_fixe= $request->get('tel_fixe');
        $benef->tel_mobile= $request->get('tel_mobile');
        $benef->email= $request->get('email');

        $benef->etat = $request->get('etat');

        $benef->save();

        flash('Bénéficiaire modifié.');
        return redirect('beneficiaires');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function desactivate($id)
    {

        $benef = beneficiaire::find($id);
        $benef->etat = 0;

        $benef->save();

        return redirect('beneficiaires');
    }

    public function activate($id)
    {

        $benef = beneficiaire::find($id);
        $benef->etat = 1;

        $benef->save();

        return redirect('beneficiaires');
    }
}
