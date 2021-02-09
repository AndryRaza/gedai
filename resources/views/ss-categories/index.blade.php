@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/ss-categories">Types d'actes</a></li>
    </ol>
</nav>



<h1 class="text-center">Liste des types d'actes </h1>
<div class="container w-25  mb-3 text-center">
    @include('flash::message')
</div>
<div class=" mb-3">
    <table class="table table-bordered table-striped mb-3" id="laravel_datatable">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Créé le</th>
                <th scope="col">Modifié le </th>
                <th scope="col">Catégorie</th>
                <th scope="col">Type d'acte</th>
                <th scope="col">Etat</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
    </table>
</div>


@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_sscategories.js')}}">
</script>
@endpush