@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beneficiaires">Bénéficiaires</a></li>
  </ol>
</nav>


<h1 class="text-center">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-badge-fill mr-1 mb-1" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                    </svg>
 Liste des bénéficiaires </h1>




<div class="container w-25  mb-3 text-center">
  @include('flash::message')
</div>
<div class=" mb-3">
  <table class="table table-bordered table-striped table-hover  py-2" id="laravel_datatable">
    <thead>
      <tr>
        <th></th>
        <th scope="col">id</th>
        <th scope="col">Créé le </th>
        <th scope="col">Type bénéficiaire</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Organisme</th>
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
<script src="{{asset('javascript/script_datatable_beneficiaires.js')}}">
</script>
@endpush