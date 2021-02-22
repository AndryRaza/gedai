@extends('layout_administrateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/beneficiaires">Bénéficiaires</a></li>
        <li class="breadcrumb-item"><a href="{{ route('beneficiaires.create') }}">Ajouter un bénéficiaire</a></li>
    </ol>
</nav>

<h1 class="text-center">Ajouter un bénéficiaire</h1>

<div class="container">
    <form action="{{ route('beneficiaires.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du bénéficiaire</label>
            <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" name="nom" placeholder="Ex: Doe" value="{{old('nom')}}">
            @if($errors->has('nom'))
            <div class="text-danger ">{{ $errors->first('nom') }}</div>
            @endif
        </div>


        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom du bénéficiaire</label>
            <input type="text" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" id="prenom" name="prenom" placeholder="Ex: John" value="{{old('prenom')}}">
            @if($errors->has('prenom'))
            <div class="text-danger ">{{ $errors->first('prenom') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="type_benef" class="form-label">Type du bénéficiaire</label>
            <select class="form-control" id="type_benef" name="type_benef">
                @foreach($types as $type)
                <option value="{{$type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="organisme" class="form-label">Organisme</label>
            <input type="text" class="form-control {{ $errors->has('organisme') ? 'is-invalid' : '' }}" id="organisme" name="organisme" placeholder="Ex: CCAS SAINT LOUIS" value="{{old('organisme')}}">
            @if($errors->has('organisme'))
            <div class="text-danger ">{{ $errors->first('organisme') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" id="adresse" name="adresse" placeholder="1 rue Je sais pas quoi" value="{{old('adresse')}}">
            @if($errors->has('adresse'))
            <div class="text-danger ">{{ $errors->first('adresse') }}</div>
            @endif
        </div>

        <div class="mb-3 row row-cols-2">
            <div class="col">
                <label for="code_postal" class="form-label">Code postal</label>
                <input type="text" class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }}" id="code_postal" name="code_postal" placeholder="97410" value="{{old('code_postal')}}">
                @if($errors->has('code_postal'))
                <div class="text-danger ">{{ $errors->first('code_postal') }}</div>
                @endif
            </div>
            <div class="col">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }}" id="ville" name="ville" placeholder="Saint-Pierre" value="{{old('ville')}}">
                @if($errors->has('ville'))
                <div class="text-danger ">{{ $errors->first('ville') }}</div>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label for="tel_fixe" class="form-label">Téléphone fixe*</label>
            <input type="phone" class="form-control {{ $errors->has('tel_fixe') ? 'is-invalid' : '' }}" id="tel_fixe" name="tel_fixe" placeholder="01234567" value="{{old('tel_fixe')}}">
            @if($errors->has('tel_fixe'))
            <div class="text-danger">{{ $errors->first('tel_fixe') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="tel_mobile" class="form-label">Téléphone mobile*</label>
            <input type="phone" class="form-control {{ $errors->has('tel_mobile') ? 'is-invalid' : '' }}" id="tel_mobile" name="tel_mobile" placeholder="01234567" value="{{old('tel_mobile')}}">
            @if($errors->has('tel_mobile'))
            <div class="text-danger">{{ $errors->first('tel_mobile') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="johndoe@mail.com" value="{{old('email')}}">
            @if($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
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

        <button class="btn btn-primary mb-3" type="submit">Ajouter</button>
        <p class="mb-3"> *Champs non obligatoires </p>
    </form>
</div>



@endsection

@push('scripts')
<script src="{{asset('javascript/script_api_adresse.js')}}">
</script>
@endpush