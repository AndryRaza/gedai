<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nature_acte;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ActeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actes = nature_acte::all();
        return view('actes.index',compact('actes'));
    }

    public function acteList(Request $request)
    {
            $actes = DB::table('nature_actes')
                    ->select('*')
                    ->get();

            return datatables()->of($actes)
            ->addColumn('modifier',function($row){
                $btn = '<a href="/actes/'.$row->id.'/edit"  class="btn btn-primary "> Modifier </a>    ';
                return $btn; 

            })
            ->addColumn('désactiver',function($row){
                if ($row->etat == 1)
                {  $btn = '<a href="actes/desactivate/' . $row->id . '"  class="btn btn-danger"> Désactiver </a>';}
                else  {  $btn = '<a href="actes/activate/' . $row->id . '"  class="btn btn-success"> Activer </a>';}
                  return $btn;
            })
          
            ->rawColumns(['modifier','désactiver'])
            ->editColumn('etat', function ($sscat) {
                if ($sscat->etat === '1') {
                    return 'Actif';
                } else {
                    return 'Inactif';
                }
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
        return view('actes.create');
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
            'nom'=>'required|regex:/^[A-Za-z é è \' . ]+$/',
            'etat'=>'required|integer'
        ]);

        $new_acte = new nature_acte([
            'acte'=>$request->get('nom'),
            'etat'=>$request->get('etat')
        ]);

        $new_acte->save();

        flash('Une nature d\'un acte a été ajouté');
        Log::info( '"'.$new_acte->acte .'"'. ' a été créé.');

        return redirect('actes');
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
        $acte = nature_acte::find($id);
        return view('actes.edit',compact('acte'));
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
            'nom'=>'required|regex:/^[A-Za-z é è \' . ]+$/',
            'etat'=>'required|integer'
        ]);

        $acte = nature_acte::find($id);

        $acte->acte = $request->get('nom');
        $acte->etat = $request->get('etat');

        $acte->save();

        flash('La nature de l\'acte a été modifiée');
        Log::info( '"'.$acte->acte .'"'. ' a été modifié.');
        return redirect('actes');
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

        $acte = nature_acte::find($id);
        $acte->etat = 0; 

        $acte->save();
        Log::info( '"'.$acte->acte .'"'. ' a été désactivé.');

        return redirect('actes');
    }

    public function activate($id){

        $acte = nature_acte::find($id);
        $acte->etat = 1; 

        $acte->save();
        Log::info( '"'.$acte->acte .'"'. ' a été activé.');

        return redirect('actes');
    }
}
