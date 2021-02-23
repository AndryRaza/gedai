<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorie;
use App\sous_categorie;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SSCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ss-categories.index');
    }

    public function sscategorieList(Request $request)
    {
            $utilisateurs = DB::table('sous_categories')
                    ->select('sous_categories.id','sous_categories.created_at','sous_categories.updated_at','categories.categorie',
                    'sous_categories.sous_categorie','sous_categories.etat')
                    ->join('categories','categories.id','=','sous_categories.categorie_id')
                    ->get();

            return datatables()->of($utilisateurs)
            ->addColumn('modifier',function($row){
                $btn = '<a href="/ss-categories/'.$row->id.'/edit"  class="btn btn-primary text-center"> Modifier </a>    ';
                return $btn; 

            })
            ->addColumn('désactiver',function($row){
                if ($row->etat == 1)
              {  $btn = '<a href="ss-categories/desactivate/' . $row->id . '"  class="btn btn-danger"> Désactiver </a>';}
              else  {  $btn = '<a href="ss-categories/activate/' . $row->id . '"  class="btn btn-success"> Activer </a>';}
                return $btn;
            })
          
            ->rawColumns(['modifier','désactiver'])
            ->editColumn('categorie_id',function($sscat){
                return $sscat->categorie;
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
        $categories = categorie::all();
        return view('ss-categories.create',compact('categories'));
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
            'nom'=>'required|min:3|max:255|regex:/^[A-Za-z é è \' à . î ]+$/',
            'categorie'=>'required|integer',
            'etat'=>'required|integer'
        ]);

        $new_sscategorie = new sous_categorie([
            'categorie_id'=>$request->get('categorie'),
            'sous_categorie'=>$request->get('nom'),
            'etat'=> $request->get('etat')
        ]);

        $new_sscategorie->save();

        flash('Type d\'acte ajouté');
        Log::info( 'Le type d\'acte "'.$new_sscategorie->sous_categorie .'"'. ' a été créé.');
        
        return redirect('ss-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sscategorie = sous_categorie::find($id);
        $categories = categorie::all();
        return view('ss-categories.edit',compact('sscategorie','categories'));
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
            'nom'=>'required|min:3|max:255|regex:/^[A-Za-z é è \' à . î ]+$/',
            'categorie'=>'required|integer',
            'etat'=>'required|integer'
        ]);

        $sscategorie = sous_categorie::find($id);

        $sscategorie->sous_categorie = $request->get('nom');
        $sscategorie->categorie_id = $request->get('categorie');
        $sscategorie->etat = $request->get('etat');

        $sscategorie->save();
        Log::info( 'Le type d\'acte "'.$sscategorie->sous_categorie .'"'. ' a été modifié.');
        flash('Type d\'acte modifié');
        return redirect('ss-categories');
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

    public function desactivate($id){

        $sscategorie = sous_categorie::find($id);
        $sscategorie->etat = 0; 

        $sscategorie->save();
        Log::info( 'Le type d\'acte "'.$sscategorie->sous_categorie .'"'. ' a été désactivé.');

        return redirect('ss-categories');
    }

    public function activate($id){

        $sscategorie = sous_categorie::find($id);
        $sscategorie->etat = 1; 

        $sscategorie->save();
        Log::info( 'Le type d\'acte "'.$sscategorie->sous_categorie .'"'. ' a été activé.');

        return redirect('ss-categories');
    }



}
