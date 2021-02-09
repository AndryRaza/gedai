@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/utilisateurs">Utilisateur</a></li>
    <li class="breadcrumb-item"><a href="{{ route('utilisateurs.edit', $utilisateur->id) }}">Modifier un utilisateur</a></li>
  </ol>
</nav>

<h1 class="text-center">Modifier un utilisateur</h1>


<div class="container text-center w-50 mt-5">
@include('flash::message')
</div>

<div class="container">
    <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="post">
        @method('PATCH')
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'utilisateur</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex: Doe" value="{{ $utilisateur-> nom }}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom de l'utilisateur</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Ex: John" value="{{ $utilisateur-> prenom }}">
            @if($errors->has('prenom'))
            <div class="text-danger ">{{ $errors->first('prenom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role de l'utilisateur</label>
            <select class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" id="role" name="role">
                @foreach($roles as $role)
                <option value="{{ $role-> id }}" {{$utilisateur->role_id == $role->id ? 'selected' : ''}}>{{ $role -> role }}</option>
                @endforeach
            </select>
            @if($errors->has('role'))
            <div class="text-danger ">{{ $errors->first('role') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Service</label>
            <select class="form-control {{ $errors->has('service') ? 'is-invalid' : '' }}" id="service" name="service">
                @foreach($services as $service)
                <option value="{{ $service-> id }}" {{ $utilisateur->service_id == $service->id ? 'selected' : ''}} >{{ $service -> service }}</option>
                @endforeach
            </select>
            @if($errors->has('service'))
            <div class="text-danger ">{{ $errors->first('service') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email de l'utilisateur</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ex: john.doe@mail.com" value="{{ $utilisateur-> email }}">
            @if($errors->has('email'))
            <div class="text-danger ">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="mdp" class="form-label">Ancien mot de passe</label>
            <input type="password" class="form-control" id="ancien_mdp" name="ancien_mdp">
        </div>


        <div class="mb-3">
            <label for="mdp" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp">
        </div>


        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone de l'utilisateur</label>
            <input type="phone" class="form-control" id="telephone" name="telephone" placeholder="Ex: 01234567" value="{{ $utilisateur-> telephone }}">
            @if($errors->has('telephone'))
            <div class="text-danger ">{{ $errors->first('telephone') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <input type="number" class="form-control" id="etat" name="etat" placeholder="Ex: 0" value="{{ $utilisateur-> etat }}">
            @if($errors->has('etat'))
            <div class="text-danger ">{{ $errors->first('etat') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>

    </form>
</div>
@endsection