@extends('layout_administrateur')

@section('content')


<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/fiches_admin">Fiches</a></li>
    </ol>
</nav>



<div class="container w-25  mb-3 text-center">
    @include('flash::message')
</div>

<h1 class="text-center">Liste des fiches </h1>
<table class="table table-bordered table-striped " id="laravel_datatable">
    <thead>
        <tr>
            <th></th>
            <th scope="col">id</th>
            <th scope="col">Créée le </th>
            <th scope="col">MAJ le </th>
            <th scope="col">Service </th>
            <th scope="col">Auteur </th>
            <th scope="col">Catégorie</th>
            <th scope="col">Sous-Catégorie</th>
            <th scope="col">Bénéficiaire</th>
            <th scope="col">N° de l'acte</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

</table>

<span class="d-flex flex-column align-items-end mt-2 mr-2  mb-3">
    <a href="/send_mail"><button class="btn btn-primary ">Envoyer la liste par mail</button></a>
</span>


@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_fiches_admin.js')}}">
</script>
@endpush