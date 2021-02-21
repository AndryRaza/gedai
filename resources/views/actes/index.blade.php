@extends('layout_administrateur')

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/actes">Natures des actes</a></li>
    </ol>
</nav>



<h1 class="text-center">Liste des natures des actes</h1>
<div class="container w-25  mb-3 text-center">
    @include('flash::message')
</div>
<div class="mb-3">
    <table class="table  table-bordered table-striped table-hover" id="laravel_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Créée le </th>
                <th scope="col">Dernière modification le</th>
                <th scope="col">Acte</th>
                <th scope="col">Etat</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
    </table>
</div>




@endsection
@push('scripts')
<script src="{{asset('javascript/script_datatable_actes.js')}}">
</script>
@endpush