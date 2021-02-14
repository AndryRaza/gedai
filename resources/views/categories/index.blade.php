@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/categories">Catégories</a></li>
    </ol>
</nav>


<h1 class="text-center">Liste des catégories </h1>
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


@endsection

@push('scripts')
<script src="{{asset('javascript/script_datatable_categories.js')}}">
</script>
@endpush

<script>
    const btn = document.querySelectorAll('input[type="checkbox"]');
    //btn =  document.getElementsByTagName("input"); 
    console.log(btn);
    btn.forEach(element => {

        element.addEventListener('click', () => {
            if (element.checked) {
                console.log(element.value);
            }
        });


    });
</script>