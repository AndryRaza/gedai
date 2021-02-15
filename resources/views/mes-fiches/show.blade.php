@extends('layout_utilisateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/mes-fiches">Mes fiches</a></li>
        <li class="breadcrumb-item"><a href="{{route('mes-fiches.show',$fiche->id)}}">Fiche n°{{$fiche->id}}</a></li>
    </ol>
</nav>


<h2 class="text-center">{{$fiche->utilisateur->service->service === '' ? 'Pas de service' : 'Service: '. $fiche->utilisateur->service->service }}</h2>
<section class="row row-cols-md-2 row-cols-1 px-3">

    <div class="col">
        <table class="table table-bordered">
            <tbody>
            <tr>
                    <td class="table-dark">Document</td>
                    <td><a href="{{asset('storage/pdf/'. $fiche->url_pdf )}}" target="_blank"> {{$fiche->url_pdf}} </a></td>
                </tr>
           
                <tr>
                    <td class="table-dark">Date d'enregistrement</td>
                    <td>{{  date('d-m-Y',strtotime($fiche-> date_enregistrement)) }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Date de l'acte</td>
                    <td>{{ date('d-m-Y',strtotime($fiche-> date_acte))  }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Numéro de l'acte</td>
                    <td>{{ $fiche->numero_acte }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Catégorie de l'acte</td>
                    <td>{{ $fiche->categorie->categorie}}</td>
                </tr>
                <tr>
                    <td class="table-dark">Type d'acte</td>
                    <td>{{ $fiche->sous_categorie->sous_categorie}}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="table-dark">Montant de l'aide</td>
                    <td>{{ $fiche->montant_aide }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Mots clés</td>
                    <td>{{ $fiche->tags }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Commentaire</td>
                    <td>{{ $fiche->commentaire }}</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="col">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="table-dark">Bénéficiaire</td>
                    <td>{{ $fiche->beneficiaire->type_beneficiaire->type }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Nom du bénéficiaire</td>
                    <td>{{ $fiche->beneficiaire->nom }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Prénom du bénéficiaire</td>
                    <td>{{ $fiche->beneficiaire->prenom }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Organisme</td>
                    <td>{{ $fiche->beneficiaire->organisme}}</td>
                </tr>
                <tr>
                    <td class="table-dark">Adresse</td>
                    <td>{{ $fiche->beneficiaire->adresse}}</td>
                </tr>
                <tr>
                    <td class="table-dark">Téléphone fixe</td>
                    <td>{{ $fiche->beneficiaire->tel_fixe}}</td>
                </tr>
                <tr>
                    <td class="table-dark">Téléphone mobile</td>
                    <td>{{ $fiche->beneficiaire->tel_mobile}}</td>
                </tr>
                <tr>
                    <td class="table-dark">Adresse électronique</td>
                    <td>{{ $fiche->beneficiaire->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

<section class="d-flex justify-content-end px-3 mb-2">
<a href="/mes-fiches/{{$fiche->id}}/edit"  class="btn btn-primary"> Modifier </a>

@if($fiche->etat == 1)
<a href="/mes-fiches/desactivate/{{$fiche->id}}" class="btn btn-danger ml-2"> Désactiver </a>  
@else 
<a href="/mes-fiches/activate/{{$fiche->id}}" class="btn btn-success ml-2"> Activer </a>  
@endif


</section>

@endsection