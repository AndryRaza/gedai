@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/beneficiaires">Bénéficiaires</a></li>
        <li class="breadcrumb-item"><a href="{{route('beneficiaires.show',$beneficiaire->id)}}">Bénéficiaire n°{{$beneficiaire->id}}</a></li>
    </ol>
</nav>


<h2 class="text-center"> {{$beneficiaire->nom}} {{$beneficiaire->prenom}} </h2>
<section class="row row-cols-md-2 row-cols-1 px-3">
    <div class="col">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="table-dark fw-bolder">Inscrit le </td>
                    <td>{{ date('d-m-Y', strtotime($beneficiaire->created_at))}}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Dernière modification</td>
                    <td> {{ date('d-m-Y H:i', strtotime($beneficiaire->updated_at))}}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Type de bénéficiaire</td>
                    <td> {{ $beneficiaire->type_beneficiaire->type}}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Organisme</td>
                    <td> {{ $beneficiaire->organisme}}</td>
                </tr>
            </tbody>
        </table>
        <h3>Fiches du bénéficiaire</h3>
        <table class="table table-bordered table-striped">
            <thead class="table-dark fw-bolder">
                <tr>
                    <th>Fiche</th>
                    <th>Créée le</th>
                    <th>Créée par</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fiches as $fiche)
                <tr>
                    <td>{{$fiche->id}}</td>
                    <td>{{date('d-m-Y H:i', strtotime($fiche->created_at))}}</td>
                    <td>{{$fiche->nom}} {{$fiche->prenom}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


    <div class="col">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="table-dark fw-bolder">Nom </td>
                    <td>{{ $beneficiaire->nom}}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Prénom</td>
                    <td> {{ $beneficiaire->prenom}}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Adresse</td>
                    <td> {{ $beneficiaire->adresse}}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Téléphone fixe</td>
                    <td> {{ $beneficiaire->tel_fixe == 0 ? 'Pas de numéro' : '0'.$beneficiaire->tel_fixe }}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Téléphone mobile</td>
                    <td> {{ $beneficiaire->tel_mobile == 0 ? 'Pas de numéro' : '0'.$beneficiaire->tel_mobile }}</td>
                </tr>
                <tr>
                    <td class="table-dark fw-bolder">Adresse électronique</td>
                    <td> {{ $beneficiaire->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

@endsection