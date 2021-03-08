@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/beneficiaires">Bénéficiaires</a></li>
        <li class="breadcrumb-item"><a href="{{ route('beneficiaires.edit',$beneficiaire->id) }}">Modifier un bénéficiaire</a></li>
    </ol>
</nav>

<h1 class="text-center">Ajouter un bénéficiaire</h1>

<div class="container">
    <form action="{{ route('beneficiaires.update',$beneficiaire->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du bénéficiaire</label>
            <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Doe" value="{{$beneficiaire->nom}}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
        </div>


        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom du bénéficiaire</label>
            <input type="text" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" id="prenom" name="prenom" placeholder="Ex: John" value="{{$beneficiaire->prenom}}">
            @if($errors->has('prenom'))
            <div class="text-danger ">{{ $errors->first('prenom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="type_benef" class="form-label">Type du bénéficiaire</label>
            <select class="form-control" id="type_benef" name="type_benef">
                @foreach($types as $type)
                <option value="{{$type->id }}" {{$beneficiaire->type_beneficiaire_id == $type->id ? 'selected' : ''}}>{{ $type->type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="organisme" class="form-label">Organisme</label>
            <input type="text" class="form-control {{ $errors->has('organisme') ? 'is-invalid' : '' }}" id="organisme" name="organisme" placeholder="Ex: CCAS SAINT LOUIS" value="{{$beneficiaire->organisme}}">
            @if($errors->has('organisme'))
            <div class="text-danger ">{{ $errors->first('organisme') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" id="adresse" name="adresse" placeholder="1 rue Je sais pas quoi" value="{{$beneficiaire->adresse}}">
            @if($errors->has('adresse'))
            <div class="text-danger ">{{ $errors->first('adresse') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="tel_fixe" class="form-label">Téléphone fixe</label>
            <input type="phone" class="form-control {{ $errors->has('tel_fixe') ? 'is-invalid' : '' }}" id="tel_fixe" name="tel_fixe" placeholder="01234567" value="{{'0' + $beneficiaire->tel_fixe}}">
            @if($errors->has('tel_fixe'))
            <div class="text-danger">{{ $errors->first('tel_fixe') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="tel_mobile" class="form-label">Téléphone mobile</label>
            <input type="phone" class="form-control {{ $errors->has('tel_mobile') ? 'is-invalid' : '' }}" id="tel_mobile" name="tel_mobile" placeholder="01234567" value="{{'0'+$beneficiaire->tel_mobile}}">
            @if($errors->has('tel_mobile'))
            <div class="text-danger">{{ $errors->first('tel_mobile') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="johndoe@mail.com" value="{{$beneficiaire->email}}">
            @if($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <select class="form-control  {{ $errors->has('etat') ? 'is-invalid' : '' }}" id="etat" name="etat">
                <option value="0" {{$beneficiaire->etat == 0 ? 'selected' : ''}}>Inactif</option>
                <option value="1" {{$beneficiaire->etat == 1 ? 'selected' : ''}}>Actif </option>
            </select>
            @if($errors->has('etat'))
            <div class="text-danger ">{{ $errors->first('etat') }}</div>
            @endif
        </div>

        <button class="btn btn-primary mb-3" type="submit">Modifier</button>
        <p class="mb-3"> *Champs non obligatoires </p>
    </form>
</div>
@endsection