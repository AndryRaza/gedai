<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorie;
use Illuminate\Auth\Events\Validated;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    public function categorieList(Request $request)
    {
        $categories = DB::table('categories')->select('*');

        return datatables()->of($categories)
            ->addColumn('modifier', function ($row) {
                $btn = '<a href="/categories/' . $row->id . '/edit"  class="btn btn-primary text-center"> Modifier </a>    ';
                return $btn;
            })
            
      
            ->addColumn('désactiver', function ($row) {
                if ($row->etat == 1)
                {  $btn = '<a href="categories/desactivate/' . $row->id . '"  class="btn btn-danger"> Désactiver </a>';}
                else  {  $btn = '<a href="categories/activate/' . $row->id . '"  class="btn btn-success"> Activer </a>';}
                  return $btn;
            })
            
            
            // ->addColumn('désactiver', function ($row) {

            //     if ($row->etat === 1) {
            //         $btn = '<div class="form-check form-switch pl-5">
            //     <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked  value="' . $row->id . '">
            //   </div>';
            //     }
            //     if ($row->etat === 0) {
            //         $btn = '<div class="form-check form-switch pl-5">
            //     <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="' . $row->id . '">
            //   </div>';
            //     }
            //     return $btn;
            // })
        
            ->editColumn('etat', function ($sscat) {
                if ($sscat->etat === 1) {
                    return 'Actif';
                } else {
                    return 'Inactif';
                }
            })
            
            ->rawColumns(['modifier', 'désactiver'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'nom' => 'required|min:3|max:255|regex:/^[A-Za-z é è \' . ]+$/',
            'etat' => 'required|integer'
        ]);

        $new_categorie = new categorie([
            'categorie' => $request->get('nom'),
            'etat' => $request->get('etat')
        ]);

        $new_categorie->save();

        Log::info( 'La catégorie "'.$new_categorie->categorie .'"'. ' a été créée.');
        flash('Catégorie ajoutée');

        return redirect('categories');
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
        $categorie = categorie::find($id);
        return view('categories.edit', compact('categorie'));
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
        $categorie = categorie::find($id);

        $request->validate([
            'nom' => 'required|min:3|max:255|regex:/^[A-Za-z é è \' . ]+$/',
            'etat' => 'required|integer'
        ]);

        $categorie->categorie = $request->get('nom');
        $categorie->etat = $request->get('etat');

        $categorie->save();
        Log::info( 'La catégorie "'.$categorie->categorie .'"'. ' a été modifiée.');

        flash('Catégorie modifiée');
        return redirect('categories');
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

        $categorie = categorie::find($id);
        $categorie->etat = 0;

        $categorie->save();
        Log::info( 'La catégorie "'.$categorie->categorie .'"'. ' a été désactivée.');

        //return redirect('categories');
    }

    public function activate($id)
    {

        $categorie = categorie::find($id);
        $categorie->etat = 1;

        Log::info( 'La catégorie "'.$categorie->categorie .'"'. ' a été activée.');
        $categorie->save();

       // return redirect('categories');
    }
}
