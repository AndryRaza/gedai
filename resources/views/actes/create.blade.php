@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/actes">Natures des actes</a></li>
    <li class="breadcrumb-item"><a href="{{ route('actes.create')}}">Ajouter une nature</a></li>
  </ol>
</nav>

<h1 class="text-center">Ajouter une nature</h1>

<div class="container">
    <form action="{{ route('actes.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la nature de l'acte</label>
            <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Commande publique" value="{{old('nom')}}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
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
</div>



@endsection
