@extends('layout_administrateur')

@section('content')

<h1 class="mt-1 text-center">Tableau de bord</h1>

<div class="row row-cols-md-2 row-cols-1 mt-5">
    <div class="col d-flex flex-column justify-content-center align-items-center">
        <h2>Derniers utilisateurs inscrits</h2>
        @foreach ($utilisateurs as $utilisateur)
        <ul>
            <li>{{$utilisateur->nom}} {{$utilisateur->prenom}}</li>
        </ul>
        @endforeach
    </div>

    <div class="col d-flex flex-column justify-content-center align-items-center">
        <h2>Dernières fiches créées</h2>
        @foreach ($fiches as $fiche)
        <ul>
            <li>{{$fiche->url_pdf}}</li>
        </ul>
        @endforeach
    </div>

</div>



<div class="d-flex flex-column align-items-center mb-3 ">
    <h2 class="text-center">Statistiques</h2>
    <form>
        <select class="form-control" name="stats_type" id="stats_type">
            <option>----</option>
            @foreach ($categories as $categorie)
            <option value="{{ $categorie->id }}"> {{$categorie->categorie}} </option>
            @endforeach
        </select>
    </form>
</div>

<section class="px-2">
    <div class="table-reponsive">
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Type d'acte</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Montant</th>
                </tr>
            </thead>
            <tbody id="table_stat">
            </tbody>
            <tfoot id="total_stat">
            </tfoot>
        </table>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{asset('javascript/script.js')}}"></script>
@endpush