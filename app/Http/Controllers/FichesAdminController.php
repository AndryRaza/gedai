<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fiche;
use Illuminate\Support\Facades\Auth;
use App\categorie;
use App\sous_categorie;
use App\beneficiaire;
use App\nature_acte;
use App\type_beneficiaire;
use App\utilisateur;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use PDF;


class FichesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('fiches_admin.index');
    }

    public function fiches_adminList(Request $request)
    {
        $fiches = DB::table('fiches')

            ->select(
                'fiches.id',
                'fiches.created_at',
                'fiches.updated_at',
                'services.service',
                'utilisateurs.nom as nom_utilisateur',
                'utilisateurs.prenom as prenom_utilisateur',
                'categories.categorie',
                'sous_categories.sous_categorie',
                'beneficiaires.nom as nom_beneficiaire',
                'nature_actes.acte',
                'fiches.date_enregistrement',
                'fiches.date_acte',
                'fiches.numero_acte',
                'fiches.url_pdf',
                'fiches.montant_aide',
                'fiches.tags',
                'fiches.commentaire',
                'fiches.etat'
            )

            ->join('utilisateurs', 'utilisateurs.id', '=', 'fiches.utilisateur_id')
            ->join('services', 'fiches.service_id', '=', 'services.id')
            ->join('categories', 'fiches.categorie_id', '=', 'categories.id')
            ->join('sous_categories', 'fiches.sous_categorie_id', '=', 'sous_categories.id')
            ->join('beneficiaires', 'fiches.beneficiaire_id', '=', 'beneficiaires.id')
            ->join('nature_actes', 'fiches.nature_acte_id', '=', 'nature_actes.id')
            ->get();



        return datatables()->of($fiches)
            ->addColumn('voir', function ($row) {
                $btn = '<a href="/fiches_admin/' . $row->id . '" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
              </svg> </a>    ';
                return $btn;
            })
            ->addColumn('modifier', function ($row) {
                $btn = '<a href="/fiches_admin/' . $row->id . '/edit"  class="btn btn-primary"> Modifier </a>    ';
                return $btn;
            })
            ->addColumn('désactiver', function ($row) {
                if ($row->etat == 1) {
                    $btn = '<a href="fiches_admin/desactivate/' . $row->id . '"  class="btn btn-danger"> Désactiver </a>';
                } else {
                    $btn = '<a href="fiches_admin/activate/' . $row->id . '"  class="btn btn-success"> Activer </a>';
                }
                return $btn;
            })
            ->rawColumns(['voir','modifier', 'désactiver','url_pdf'])
            ->editColumn('service_id', function ($user) {
                return $user->service;
            })
            ->editColumn('utilisateur_id', function ($user) {
                return $user->nom_utilisateur . ' ' . $user->prenom_utilisateur;
            })
            ->editColumn('categorie_id', function ($user) {
                return $user->categorie;
            })
            ->editColumn('sous_categorie_id', function ($user) {
                return $user->sous_categorie;
            })
            ->editColumn('beneficiaire_id', function ($user) {
                return $user->nom_beneficiaire;
            })
            ->editColumn('nature_acte_id', function ($user) {
                return $user->acte;
            })
            ->editColumn('url_pdf', function ($fiche) {
                $link = '<a id="view_pdf" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-pdf="'. $fiche->url_pdf .'">'
               .  $fiche->url_pdf  .
             ' </a>';

              return $link;
            })
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
        $categories = DB::table('categories')->where('etat','=',1)->get();
        $sous_categories = DB::table('sous_categories')->where('etat','=',1)->get();
        $beneficiaires =DB::table('beneficiaires')->where('etat','=',1)->get();
        $nature_actes = DB::table('nature_actes')->where('etat','=',1)->get();
        $type_benefs = DB::table('type_beneficiaires')->where('etat','=',1)->get();

        return view('fiches_admin.create', compact('categories', 'sous_categories', 'beneficiaires', 'nature_actes', 'type_benefs'));
    }

    public function storepdf(Request $request)
    {

        $request->validate(
            [
                'pdf' => 'required|mimetypes:application/pdf|max:10000'
            ]
        );

        $nom_fichier = "[CCAS de St-Louis]-" . date('d-m-Y') . '-' . uniqid() . ".pdf";
        request('pdf')->storeas('temp_pdf', $nom_fichier, 'public');

        return $nom_fichier;

        //return view('fiches.create', compact('nom_fichier', 'categories', 'sous_categories', 'beneficiaires', 'nature_actes', 'type_benefs'));
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
            'date_enregistrement' => 'required|date',
            'date_acte' => 'required|date',
            'numero_acte' => 'required',
            'nature_acte' => 'required',
            'categorie_acte' => 'required',
            'type_acte' => 'required',
            'beneficiaire' => 'required',
            'montant_aide' => 'regex:/^[0-9]+$/|nullable',
            'tags' => 'required',
            'commentaire' => 'required|min:3|max:255|regex:/^[A-Za-z é è \' . - é à è ç ( ) $ * î 0-9]+$/'
        ]);

        $montant_aide = $request->get('montant_aide') == NULL ? 0 : $request->get('montant_aide');

       // $nom_fichier = "[CCAS de St-Louis]-" . date('d-m-Y') . '-' . $request->get('numero_acte') . ".pdf";

       $num_enregistrement = DB::table('fiches')->count();
       $nom_fichier = "[CCAS de St-Louis]-" . date('d-m-Y') . '-' . $num_enregistrement. ".pdf";
        
        $new_fiche = new fiche([
            'service_id' => auth()->user()->service_id,
            'utilisateur_id' => auth()->user()->id,
            'categorie_id' => $request->get('categorie_acte'),
            'sous_categorie_id' => $request->get('type_acte'),
            'beneficiaire_id' => $request->get('beneficiaire'),
            'nature_acte_id' => $request->get('nature_acte'),
            'date_enregistrement' => $request->get('date_enregistrement'),
            'date_acte' => $request->get('date_acte'),
            'numero_acte' => $request->get('numero_acte'),
            'montant_aide' => $montant_aide,
            'tags' => $request->get('tags'),
            'url_pdf' => $nom_fichier,
            'commentaire' => $request->get('commentaire'),
            'etat' => 1
        ]);

        $new_fiche->save();
        Log::info( 'L\'acte  '. $nom_fichier.' a été créée par '. auth()->user()->nom . ' '. auth()->user()->prenom. '.');
        File::move(public_path('storage/temp_pdf/') .  $request->get('nom_pdf'), public_path('storage/pdf/') . $nom_fichier);

        $pdf = new Fpdi('P');
        $pagecount = $pdf->setSourceFile(public_path('storage/pdf/') . $nom_fichier);

        for ($pageno = 1; $pageno <= $pagecount; $pageno++) {
            
            $tpl = $pdf->importPage($pageno);
            
            $pdf->AddPage();

            $pdf->useTemplate($tpl);

            $pdf->SetFont('Helvetica');
            $pdf->SetFontSize('10');
            $pdf->SetXY(10, 10);
            if ($pageno === 1)
            {$pdf->Cell(0, 2, $nom_fichier, 0, 0, 'C');}
        }

        $pdf->Output('F', public_path('storage/pdf/') . $nom_fichier);

        flash('Acte créé');
        return redirect('fiches_admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fiche = fiche::find($id);
        
        return view('fiches_admin.show', compact('fiche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fiche = fiche::find($id);
        $categories = categorie::all();
        // $sous_categories = sous_categorie::all();
        $beneficiaires = beneficiaire::all();
        $nature_actes = nature_acte::all();
        $type_benefs = type_beneficiaire::all();

        $sous_categories = sous_categorie::where('categorie_id', '=', $fiche->categorie_id)->get();


        return view('fiches_admin.edit', compact('fiche', 'categories', 'sous_categories', 'beneficiaires', 'nature_actes', 'type_benefs'));
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
            'date_enregistrement' => 'required|date',
            'date_acte' => 'required|date',
            'numero_acte' => 'required',
            'nature_acte' => 'required',
            'categorie_acte' => 'required',
            'type_acte' => 'required',
            'beneficiaire' => 'required',
            'montant_aide' => 'integer|nullable',
            'tags' => 'required',
            'pdf' => 'mimetypes:application/pdf|max:10000',
            'commentaire' => 'required|min:3|max:255|regex:/^[A-Za-z é è \' . - é à è ç ( )  $ * î 0-9]+$/'
        ]);

        $montant_aide = $request->get('montant_aide') == NULL ? 0 : $request->get('montant_aide');
      
        $fiche = fiche::find($id);

        $fiche->service_id = auth()->user()->service_id;
        $fiche->utilisateur_id = auth()->user()->id;
        $fiche->categorie_id = $request->get('categorie_acte');
        $fiche->sous_categorie_id = $request->get('type_acte');
        $fiche->beneficiaire_id = $request->get('beneficiaire');
        $fiche->nature_acte_id = $request->get('nature_acte');
        $fiche->date_enregistrement = $request->get('date_enregistrement');
        $fiche->date_acte = $request->get('date_acte');
        $fiche->numero_acte = $request->get('numero_acte');
        $fiche->montant_aide =  $montant_aide;
        $fiche->tags = $request->get('tags');
        $fiche->commentaire = $request->get('commentaire');

        
        $nom_fichier = $fiche->url_pdf;
      

        if ($request->file('pdf')) {
            $request->file('pdf')->storeas('pdf', $nom_fichier, 'public');
        }

        $fiche->save();
        Log::info( 'L\'acte  '. $nom_fichier.' a été modifié');
        flash('Acte modifié');
        return redirect('fiches_admin');
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

    public function selection($id)
    {
        $sous_categories = sous_categorie::where('categorie_id', '=', $id)->get();
        return $sous_categories;
    }

    public function desactivate($id)
    {

        $fiche = fiche::find($id);
        $fiche->etat = 0;

        $fiche->save();
        Log::info( 'L\'acte n°'. $id.' a été désactivé');

        return redirect('fiches_admin');
    }

    public function activate($id)
    {

        $fiche = fiche::find($id);
        $fiche->etat = 1;

        $fiche->save();
        Log::info( 'L\'acte n°'. $id.' a été activé');

        return redirect('fiches_admin');
    }


    public function send_mail()
    {

        $data = fiche::all();

        $pdf = PDF::loadView('mails.pdf', compact('data'));
        $pdf->save(public_path('storage/temp_pdf/') . 'liste_fiches_' . auth()->id() . '.pdf');

        Mail::to('claude@example.com')
            ->send(new ContactMail);

        return redirect('fiches_admin');
    }
}
