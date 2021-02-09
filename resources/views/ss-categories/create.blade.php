@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ss-categories">Types d'actes</a></li>
    <li class="breadcrumb-item"><a href="{{ route('ss-categories.create')}}">Ajouter un type d'acte</a></li>
  </ol>
</nav>


<h1 class="text-center">Ajouter un type d'acte</h1>

<div class="container">
    <form action="{{ route('ss-categories.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du type d'acte</label>
            <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Marchés publics" value="{{old('nom')}}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Choisir la catégorie corespondante</label>
            <select class="form-control  {{ $errors->has('categorie') ? 'is-invalid' : '' }}" id="categorie" name="categorie">
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie-> categorie}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <select class="form-control  {{ $errors->has('etat') ? 'is-invalid' : '' }}" id="etat" name="etat">
            <option value="0">Inactif</option>
            <option value="1" selected>Actif </option>
            </select>
            @if($errors->has('etat'))
            <div class="text-danger ">{{ $errors->first('etat') }}</div>
            @endif
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
@endsection