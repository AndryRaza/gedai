@extends('layout_utilisateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/fiches">Fiches</a></li>
  </ol>
</nav>

<h1 class="text-center my-5">

   Liste des fiches 

</h1>

<div class="">
    <div class="container w-25  mb-3 text-center">
        @include('flash::message')
    </div>
    <table class="table table-bordered table-striped" id="laravel_datatable">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Service </th>
                <th scope="col">Auteur </th>
                <th scope="col">Catégorie</th>
                <th scope="col">Sous-Catégorie</th>
                <th scope="col">Bénéficiaire</th>
                <th scope="col">Nature de l'acte</th>
                <th scope="col">N° de l'acte</th>
                <th scope="col">Pdf</th>
            </tr>
        </thead>
      
    </table>
</div>

<span class="d-flex justify-content-center">
    
    <a href="/send_mail"><button class="btn btn-primary mb-5">Envoyer la liste par mail</button></a>
    </span>

@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_fiches.js')}}">
</script>
@endpush