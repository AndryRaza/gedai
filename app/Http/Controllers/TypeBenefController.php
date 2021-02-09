<?php

namespace App\Http\Controllers;

use App\nature_acte;
use Illuminate\Http\Request;
use App\type_beneficiaire;
use DataTables;
use Illuminate\Support\Facades\DB;

class TypeBenefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('types_benef.index');
    }

    public function typeList(Request $request)
    {
            $actes = DB::table('type_beneficiaires')
                    ->select('*')
                    ->get();

            return datatables()->of($actes)
            ->addColumn('modifier',function($row){
                $btn = '<a href="/types_benef/'.$row->id.'/edit"  class="btn btn-primary "> Modifier </a>    ';
                return $btn; 

            })
            ->addColumn('désactiver',function($row){
                if ($row->etat == 1)
              {  $btn = '<a href="types_benef/desactivate/' . $row->id . '"  class="btn btn-danger"> Désactiver </a>';}
              else  {  $btn = '<a href="types_benef/activate/' . $row->id . '"  class="btn btn-success"> Activer </a>';}
                return $btn;
            })
          
            ->rawColumns(['modifier','désactiver'])
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
        return view('types_benef.create');
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
            'nom'=>'required|min:3|max:255|regex:/^[A-Z a-z é è \' . -]+$/',
            'etat'=>'required|integer'
        ]);

        $new_type = new type_beneficiaire([
            'type'=> $request->get('nom'),
            'etat'=>$request->get('etat')
        ]);

        $new_type->save();

        flash('Type de bénéficiaire ajouté.');
        return redirect('types_benef');
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
        $type_benef = type_beneficiaire::find($id);
        return view('types_benef.edit',compact('type_benef'));
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
            'nom'=>'required|min:3|max:255|regex:/^[A-Z a-z é è \' . -]+$/',
            'etat'=>'required|integer'
        ]);

        $type = type_beneficiaire::find($id);

        $type->type = $request->get('nom');
        $type->etat = $request->get('etat');

        $type->save();

        flash('Type de bénéficiaire modifié');
        return redirect('types_benef');
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

        $type = type_beneficiaire::find($id);
        $type->etat = 0; 

        $type->save();

        return redirect('types_benef');
    }

    public function activate($id){

        $type = type_beneficiaire::find($id);
        $type->etat = 1; 

        $type->save();

        return redirect('types_benef');
    }


}
