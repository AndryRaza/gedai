@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/types_benef">Types de bénéficiaires</a></li>
        <li class="breadcrumb-item"><a href="{{route('types_benef.edit',$type_benef->id)}}">Modifier un type de bénéficiaire</a></li>
    </ol>
</nav>


<h1 class="text-center">Modifier le type de bénéficiaire</h1>

<div class="container">
    <form action="{{ route('types_benef.update',$type_benef -> id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du type</label>
            <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Commande publique" value="{{$type_benef -> type}}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <select class="form-control  {{ $errors->has('etat') ? 'is-invalid' : '' }}" id="etat" name="etat">
                <option value="0" {{$type_benef -> etat == 0 ? 'selected' : '' }}>Inactif</option>
                <option value="1" {{$type_benef -> etat == 1 ? 'selected' : '' }}>Actif </option>
            </select>
            @if($errors->has('etat'))
            <div class="text-danger ">{{ $errors->first('etat') }}</div>
            @endif
        </div>
        <span class="d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Modifier</button>
        </span>
    </form>
</div>



@endsection