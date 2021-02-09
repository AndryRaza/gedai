@extends('layout_administrateur')

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/utilisateurs">Utilisateurs</a></li>
        <li class="breadcrumb-item"><a href="{{ route('utilisateurs.show',$utilisateur->id) }}">Utilisateur : {{ $utilisateur->nom }} {{ $utilisateur->prenom }}</a></li>
    </ol>
</nav>

<h2 class="text-center">{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h2>

<section class="row row-cols-md-2 row-cols-1 px-3">

    <div class="col">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="table-dark">Créé le </td>
                    <td>{{ date('d-m-Y', strtotime($utilisateur->created_at)) }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Dernière modification le </td>
                    <td>{{ date('d-m-Y H:i', strtotime($utilisateur->updated_at)) }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="table-dark">Rôle</td>
                    <td>{{ $utilisateur->role->role }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Service </td>
                    <td>{{ $utilisateur->service->service}}</td>
                </tr>
            </tbody>
        </table>

        <h3>Liste des fiches de  {{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <th>Fiche</th>
                <th>Bénéficiaire</th>
                <th>Créée le</th>
                <th>Dernière modification</th>
            </thead>
            <tbody>
                @foreach($fiches as $fiche)
                <tr>
                    <td>{{ $fiche->id }}</td>
                    <td>{{ $fiche->nom }} {{ $fiche->prenom }}</td>
                    <td>{{ date('d-m-Y', strtotime($fiche->created_at)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($fiche->updated_at)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="col">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="table-dark">Nom </td>
                    <td>{{ $utilisateur->nom }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Prénom </td>
                    <td>{{ $utilisateur->prenom }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Adresse électronique </td>
                    <td>{{ $utilisateur->email}}</td>
                </tr>
                <tr>
                    <td class="table-dark">Téléphone </td>
                    <td>{{ $utilisateur->telephone }}</td>
                </tr>
                <tr>
                    <td class="table-dark">Etat </td>
                    <td>{{ $utilisateur->etat == 1 ? 'Actif' : 'Inactif' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>


@endsection