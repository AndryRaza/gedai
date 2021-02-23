@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/utilisateurs">Utilisateur</a></li>
        <li class="breadcrumb-item"><a href="{{ route('utilisateurs.create') }}">Ajouter un utilisateur</a></li>
    </ol>
</nav>

<h1 class="text-center">Ajouter un utilisateur</h1>

<div class="container">
    <form action="{{ route('utilisateurs.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <div class="row row-cols-md-2 row-cols-1">

                <div class="col">
                    <label for="nom" class="form-label">Nom de l'utilisateur</label>
                    <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Doe" value="{{old('nom')}}">
                    @if($errors->has('nom'))
                    <div class="text-danger ">{{ $errors->first('nom') }}</div>
                    @endif
                </div>

                <div class="col">
                    <label for="prenom" class="form-label">Prénom de l'utilisateur</label>
                    <input type="text" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" id="prenom" name="prenom" placeholder="Ex: John" value="{{old('prenom')}}">
                    @if($errors->has('prenom'))
                    <div class="text-danger ">{{ $errors->first('prenom') }}</div>
                    @endif
                </div>

            </div>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role de l'utilisateur</label>
            <select class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" id="role" name="role">
                @foreach($roles as $role)
                <option value="{{ $role-> id }}" {{ old('role') == $role->id ? 'selected' : ''}}>{{ $role -> role }}</option>
                @endforeach
            </select>
            @if($errors->has('role'))
            <div class="text-danger ">{{ $errors->first('role') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email de l'utilisateur</label>
            <input type="email" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Ex: john.doe@mail.com" value="{{old('email')}}">
            @if($errors->has('email'))
            <div class="text-danger ">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" class="form-control  {{ $errors->has('mdp') ? 'is-invalid' : '' }}" id="mdp" name="mdp">
            @if($errors->has('mdp'))
            <div class="text-danger ">{{ $errors->first('mdp') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone de l'utilisateur</label>
            <input type="phone" class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" id="telephone" name="telephone" placeholder="Ex: 01234567" value="{{old('telephone')}}">
            @if($errors->has('telephone'))
            <div class="text-danger ">{{ $errors->first('telephone') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <select class="form-control  {{ $errors->has('etat') ? 'is-invalid' : '' }}" id="etat" name="etat">
                <option value="0">Inactif</option>
                <option value="1">Actif </option>
            </select>
            @if($errors->has('etat'))
            <div class="text-danger ">{{ $errors->first('etat') }}</div>
            @endif

        </div>
        <span class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-5">Créer l'utilisateur</button>
        </span>
    </form>
</div>
@endsection