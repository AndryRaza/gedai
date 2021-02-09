@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/utilisateurs">Utilisateurs</a></li>
    </ol>
</nav>

<h1 class="text-center">Liste des utilisateurs</h1>
<div class="container w-25  mb-3 text-center">
    @include('flash::message')
</div>
<div class="mb-3">
    <table class="table table-bordered table-striped " id="laravel_datatable">
        <thead>
            <tr>
                <th></th>
                <th scope="col">id</th>
                <th scope="col">Crée le</th>
                <th scope="col">Role</th>
                <th scope="col">Service</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Etat</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_utilisateurs.js')}}">
</script>
@endpush