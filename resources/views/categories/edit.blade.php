@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/categories">Catégories</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.edit',$categorie->id)}}">Modifier une catégorie</a></li>
  </ol>
</nav>


<h1 class="text-center">Modifier une catégorie</h1>

<div class="container">
    <form action="{{ route('categories.update', $categorie-> id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Commande publique" value="{{$categorie-> categorie}}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <select class="form-control  {{ $errors->has('etat') ? 'is-invalid' : '' }}" id="etat" name="etat">
            <option value="0"  {{ $categorie-> etat == 0 ? 'selected' : ''}} >Inactif</option>
            <option value="1"  {{ $categorie-> etat == 1 ? 'selected' : ''}}>Actif </option>
            </select>
            @if($errors->has('etat'))
            <div class="text-danger ">{{ $errors->first('etat') }}</div>
            @endif
        </div>

        <button class="btn btn-primary" type="submit">Modifier</button>
    </form>

</div>

@endsection