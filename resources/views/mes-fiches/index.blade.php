@extends('layout_utilisateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/mes-fiches">Mes Fiches</a></li>
    </ol>
</nav>

<h1 class="text-center my-5">

    Mes fiches

</h1>

<div class="">
    <div class="container w-25  mb-3 text-center">
        @include('flash::message')
    </div>
    <table class="table table-bordered table-striped" id="laravel_datatable">
        <thead>
            <tr>
                <th></th>
                <th scope="col">id</th>
                <th scope="col">Créée le </th>
                <th scope="col">Catégorie</th>
                <th scope="col">Sous-Catégorie</th>
                <th scope="col">Bénéficiaire</th>
                <th scope="col">Nature de l'acte</th>
                <th scope="col">N° de l'acte</th>
                <th scope="col">Pdf</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

    </table>
</div>
@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_mesfiches.js')}}">
</script>
@endpush