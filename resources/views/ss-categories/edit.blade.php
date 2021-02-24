@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/ss-categories">Types d'actes</a></li>
        <li class="breadcrumb-item"><a href="{{ route('ss-categories.edit',$sscategorie->id)}}">Modifier un type d'acte</a></li>
    </ol>
</nav>


<h1 class="text-center">Modifier un type d'acte</h1>

<div class="container">
    <form action="{{ route('ss-categories.update',$sscategorie->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la sous-catégorie</label>
            <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Commande publique" value="{{$sscategorie -> sous_categorie }}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Choisir la catégorie corespondante</label>
            <select class="form-control  {{ $errors->has('categorie') ? 'is-invalid' : '' }}" id="categorie" name="categorie">
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{$categorie->id == $sscategorie->categorie_id ? 'selected' : '' }}>{{ $categorie-> categorie}}</option>
                @endforeach
            </select>
            @if($errors->has('categorie'))
            <div class="text-danger ">{{ $errors->first('categorie') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <select class="form-control  {{ $errors->has('etat') ? 'is-invalid' : '' }}" id="etat" name="etat">
                <option value="0" {{ $sscategorie->etat == 0 ? 'selected' : ''}}>Inactif</option>
                <option value="1" {{ $sscategorie->etat == 1 ? 'selected' : ''}}>Actif </option>
            </select>
            @if($errors->has('etat'))
            <div class="text-danger ">{{ $errors->first('etat') }}</div>
            @endif
        </div>
        <span class="d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Modifier</button>
        </span>
    </form>
    @endsection