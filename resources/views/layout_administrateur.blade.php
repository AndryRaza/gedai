<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Application Gedai</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}} " rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href=" {{ asset('css/simple-sidebar.css')}} ">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- CDN pour yajra datatable     
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    -->

    <!-- CDN pour rendre datatable responsive -->
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"> </script>

    <!-- CDN pour l'exportation en csv -->

    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <!-- Autocomplete -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>


</head>

<body>


    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Gedai</div>
            <div class="list-group list-group-flush">
                <a href="/administration" class="list-group-item list-group-item-action bg-light" id="list-dashboard"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill mr-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>Tableau de bord</a>
                <a data-bs-toggle="collapse" href="#menu_utilisateurs" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action bg-light">Utilisateurs</a>
                <div class="collapse" id="menu_utilisateurs">
                    <div class="card card-body lien-menu">
                        <a href="/utilisateurs">-> Voir la liste</a> <br>
                        <a href="{{route('utilisateurs.create')}}">-> Créer un utilisateur</a>
                    </div>
                </div>
                <a data-bs-toggle="collapse" href="#menu_categories" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action bg-light">Catégories</a>
                <div class="collapse" id="menu_categories">
                    <div class="card card-body lien-menu">
                        <a href="/categories">-> Voir la liste</a> <br>
                        <a href="{{route('categories.create')}}">-> Créer une catégorie</a>
                    </div>
                </div>
                <a data-bs-toggle="collapse" href="#menu_sscategories" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action bg-light">Types d'acte</a>
                <div class="collapse" id="menu_sscategories">
                    <div class="card card-body lien-menu">
                        <a href="/ss-categories">-> Voir la liste</a> <br>
                        <a href="{{route('ss-categories.create')}}">-> Créer un type</a>
                    </div>
                </div>
                <a data-bs-toggle="collapse" href="#menu_actes" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action bg-light">Natures des actes</a>
                <div class="collapse" id="menu_actes">
                    <div class="card card-body lien-menu">
                        <a href="/actes">-> Voir la liste</a> <br>
                        <a href="{{route('actes.create')}}">-> Créer un acte</a>
                    </div>
                </div>
                <a data-bs-toggle="collapse" href="#menu_typesbenef" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action bg-light">Types de bénéficiaires</a>
                <div class="collapse" id="menu_typesbenef">
                    <div class="card card-body lien-menu">
                        <a href="/types_benef">-> Voir la liste</a> <br>
                        <a href="{{route('types_benef.create')}}">-> Créer un type</a>
                    </div>
                </div>
                <a data-bs-toggle="collapse" href="#menu_beneficiaires" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action bg-light">Bénéficiaires</a>
                <div class="collapse" id="menu_beneficiaires">
                    <div class="card card-body lien-menu">
                        <a href="/beneficiaires">-> Voir la liste</a> <br>
                        <a href="{{route('beneficiaires.create')}}">-> Créer un bénéficiaire</a>
                    </div>
                </div>
                <a data-bs-toggle="collapse" href="#menu_fiches" role="button" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action bg-light">Actes</a>
                <div class="collapse" id="menu_fiches">
                    <div class="card card-body lien-menu">
                        <a href="/fiches_admin">-> Voir la liste</a> <br>
                        <a href="{{route('fiches_admin.create')}}">-> Créer une fiche</a>
                    </div>
                </div>
                <a class="d-flex justify-content-center" href="/delete_tmp"> <button class="btn btn-primary mt-2">Vider le dossier temporaire</button> </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn " id="menu-toggle"> <span class="navbar-toggler-icon "></span></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="mr-3 mt-2"><strong>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>
                                Connecté : {{auth()->user()->nom}} {{auth()->user()->prenom}}</strong></li>
                        <li class="nav-item">
                            <a href="/deconnexion" class="btn btn-primary">Déconnexion
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <!-- DataTables -->

    @stack('scripts')
</body>

</html>