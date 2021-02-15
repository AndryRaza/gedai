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

<script>
  $('body').on('click','#flexSwitchCheckChecked',function(){
    var checked = $(this).prop('checked');
    var id = $(this).val();
    if (!checked){
        $.ajax({
            url: '/categories/desactivate/'+id,
            type:'GET',
            success: function (data){
                alert('Catégorie désactivée')
            }
        })
    }

    if (checked){
        $.ajax({
            url: '/categories/activate/'+id,
            type:'GET',
            success: function (data){
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
