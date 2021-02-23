@extends('layout_administrateur')

@section('content')

<h1 class="mt-1 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-fill mr-2" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
    </svg>
    Tableau de bord
</h1>



<section class="px-2 mx-3 my-5">
    <div class="row row-cols-md-2 row-cols-1">
        <div class="col">
            <div class="d-flex flex-column align-items-center mb-3 ">
                <h2 class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                        <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                    </svg>
                    Statistiques</h2>
                <form class="d-flex flex-column">
                    <!--
        <select class="form-select" name="stats_date" id="stats_date">
            <option>----</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
        </select>
        -->
                    <select class="form-select" name="stats_type" id="stats_type">
                        <option>----</option>
                        @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}"> {{$categorie->categorie}} </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="table-reponsive ">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Type d'acte</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Montant</th>
                        </tr>
                    </thead>
                    <tbody id="table_stat">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot id="total_stat">
                        <tr class="table-secondary" style="font-size:20px">
                            <td class="d-flex justify-content-end">Total</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="col ">

            <h2 class="text-center mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
                Chiffres clés
            </h2>
            <div class="d-flex">
                <div class="card m-auto bg-info text-white bg-gradient" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Utilisateurs</h5>

                        <p class="card-text text-center fs-3">{{$nbre_utilisateurs}}</p>
                    </div>
                </div>

                <div class="card m-auto bg-info text-white bg-gradient" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center ">Actes</h5>
                        <p class="card-text text-center fs-3">{{$nbre_actes}}</p>

                    </div>
                </div>
            </div>

            <div class="d-flex mt-3">
                <div class="card m-auto bg-info text-white bg-gradient" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Catégories</h5>

                        <p class="card-text text-center fs-3">{{$nbre_categories}}</p>
                    </div>
                </div>

                <div class="card m-auto bg-info text-white bg-gradient" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center ">Types d'acte</h5>
                        <p class="card-text text-center fs-3">{{$nbre_types}}</p>

                    </div>
                </div>
            </div>


            <div class="d-flex mt-3">
                <div class="card m-auto bg-info text-white" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Natures</h5>

                        <p class="card-text text-center fs-3">{{$nbre_natures}}</p>
                    </div>
                </div>

                <div class="card m-auto bg-info text-white" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center ">Bénéficiaires</h5>
                        <p class="card-text text-center fs-3">{{$nbre_beneficiaires}}</p>

                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

<!-- <div class="row row-cols-md-2 row-cols-1 mt-5">
    <div class="col">
        <h2 class="text-center">Derniers utilisateurs inscrits</h2>
        <ul class="list-group">
            @foreach ($utilisateurs as $utilisateur)

            <li class="list-group-item">{{$utilisateur->nom}} {{$utilisateur->prenom}}</li>

            @endforeach
        </ul>
    </div>

    <div class="col d-flex flex-column justify-content-center align-items-center">
        <h2>Dernières fiches créées</h2>
        @foreach ($fiches as $fiche)
        <ul>
            <li>{{$fiche->url_pdf}}</li>
        </ul>
        @endforeach
    </div>

</div> -->


@endsection

@push('scripts')
<script src="{{asset('javascript/script.js')}}"></script>
@endpush