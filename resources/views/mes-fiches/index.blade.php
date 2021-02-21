@extends('layout_utilisateur')

@section('content')

<style>

#view_pdf:hover{
cursor: pointer;
color:red; 
}

</style>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/mes-fiches">Mes actes</a></li>
    </ol>
</nav>

<h1 class="text-center my-5">

    Mes actes

</h1>

<div class="">
    <div class="container w-25  mb-3 text-center">
        @include('flash::message')
    </div>
    <table class="table table-bordered table-striped table-hover" id="laravel_datatable">
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height:400px" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
  $('body').on('click','#view_pdf',function(){
    var pdf = $(this).data('pdf');
    console.log(pdf);
    var str = ` <iframe class="w-100 h-100" src="{{asset('storage/pdf/` + pdf + `')}}" style="max-height:400px;"></iframe>`
    console.log(str)
    $('.modal-body').html(str);
  })
</script>


@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_mesfiches.js')}}">
</script>
@endpush