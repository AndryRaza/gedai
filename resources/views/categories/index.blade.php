@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/categories">Catégories</a></li>
    </ol>
</nav>


<h1 class="text-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-collection-fill mb-1 mr-1" viewBox="0 0 16 16">
        <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
    </svg>
    Liste des catégories
</h1>
<div class="container w-25  mb-3 text-center">
    @include('flash::message')
</div>
<div>
    <table class="table table-bordered table-striped table-hover" id="laravel_datatable">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Categorie</th>
                <th scope="col">Crée le </th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $('body').on('click', '#flexSwitchCheckChecked', function() {
        var checked = $(this).prop('checked');
        var id = $(this).val();
        if (!checked) {
            $.ajax({
                url: '/categories/desactivate/' + id,
                type: 'GET',
                success: function(data) {
                    alert('Catégorie désactivée')
                }
            })
        }

        if (checked) {
            $.ajax({
                url: '/categories/activate/' + id,
                type: 'GET',
                success: function(data) {
                    alert('Catégorie activée')
                }
            })
        }


    })
</script>

@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_categories.js')}}">
</script>
@endpush