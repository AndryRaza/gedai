@extends('layout_administrateur')

@section('content')


<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/fiches_admin">Actes</a></li>
    </ol>
</nav>



<div class="container w-25  mb-3 text-center">
    @include('flash::message')
</div>

<h1 class="text-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-text-fill mr-1 mb-1" viewBox="0 0 16 16">
        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z" />
    </svg>
    Liste des actes
</h1>
<table class="table table-bordered table-striped table-hover" id="laravel_datatable">
    <thead>
        <tr>
            <th></th>
            <th scope="col">id</th>
            <th scope="col">Créée le </th>
            <th scope="col">MAJ le </th>
            <th scope="col">Service </th>
            <th scope="col">Auteur </th>
            <th scope="col">Catégorie</th>
            <th scope="col">Type de l'act e</th>
            <th scope="col">PDF</th>
            <th scope="col">N° de l'acte</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

</table>

<span class="d-flex flex-column align-items-end mt-2 mr-2  mb-3">
    <a href="/send_mail"><button class="btn btn-primary ">Envoyer la liste par mail</button></a>
</span>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height:400px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '#view_pdf', function() {
        var pdf = $(this).data('pdf');
        console.log(pdf);
        var str = ` <iframe class="w-100 h-100" src="{{asset('storage/pdf/` + pdf + `')}}" style="max-height:400px;"></iframe>`
        console.log(str)
        $('.modal-body').html(str);
    })
</script>
@endsection

<style>
    #view_pdf:hover {
        cursor: pointer;
        color: red;
    }
</style>

@push('scripts')
<script src="{{asset('javascript/script_datatable_fiches_admin.js')}}">
</script>
@endpush