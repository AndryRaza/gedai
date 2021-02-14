@extends('layout_utilisateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/mes-fiches">Mes Fiches</a></li>
    <li class="breadcrumb-item"><a href="{{route('mes-fiches.edit',$fiche->id)}}">Modifier ma fiche</a></li>
  </ol>
</nav>


<h1 class="text-center">Modifier la fiche n°{{$fiche ->id }}</h1>


<div>
    <div class="row row-cols-md-2 row-cols-1">
        <div class="col">
            <form action="{{ route('mes-fiches.update',$fiche->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="date_enregistrement" class="form-label">Date d'enregistrement</label>
                    <input type="date" class="form-control {{ $errors->has('date_enregistrement') ? 'is-invalid' : '' }}" id="date_enregistrement" name="date_enregistrement" value="{{$fiche->date_enregistrement}}">
                    @if($errors->has('date_enregistrement'))
                    <div class="text-danger ">{{ $errors->first('date_enregistrement') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="date_acte" class="form-label">Date de l'acte</label>
                    <input type="date" class="form-control {{ $errors->has('date_acte') ? 'is-invalid' : '' }}" id="date_acte" name="date_acte" value="{{$fiche->date_acte}}">
                    @if($errors->has('date_acte'))
                    <div class="text-danger ">{{ $errors->first('date_acte') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="numero_acte" class="form-label">Numéro de l'acte</label>
                    <input type="text" class="form-control {{ $errors->has('numero_acte') ? 'is-invalid' : '' }}" id="numero_acte" name="numero_acte" value="{{$fiche->numero_acte}}">
                    @if($errors->has('numero_acte'))
                    <div class="text-danger ">{{ $errors->first('numero_acte') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="nature_acte" class="form-label">Nature de l'acte</label>
                    <select class="form-control" id="nature_acte" name="nature_acte">
                        @foreach($nature_actes as $nature)
                        <option value="{{ $nature -> id}}" {{$nature->id == $fiche->nature_acte_id ? 'selected' : ''}}> {{ $nature-> acte }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('nature_acte'))
                    <div class="text-danger ">{{ $errors->first('nature_acte') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="categorie_acte" class="form-label">Catégorie de l'acte</label>
                    <select class="form-control" id="categorie_acte" name="categorie_acte">
                        <option selected>-------</option>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie -> id}}" {{$categorie->id == $fiche->categorie_id ? 'selected' : ''}}> {{ $categorie-> categorie }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('categorie_acte'))
                    <div class="text-danger ">{{ $errors->first('categorie_acte') }}</div>
                    @endif
                </div>
                <div id="test"></div>
                <div class="mb-3">
                    <label for="type_acte" class="form-label">Type de l'acte</label>
                    <select class="form-control" id="type_acte" name="type_acte">
                    @foreach($sous_categories as $sous_categorie)
                    <option value="{{$sous_categorie->id}}" {{$sous_categorie->id == $fiche->sous_categorie_id ? 'selected' : ''}}>{{ $sous_categorie -> sous_categorie}}</option>
                    @endforeach
                    </select>
                    @if($errors->has('type_acte'))
                    <div class="text-danger ">{{ $errors->first('type_acte') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                    <select class="form-control" id="beneficiaire" name="beneficiaire">
                        @foreach($beneficiaires as $beneficiaire)
                        <option value="{{ $beneficiaire -> id}}" {{$beneficiaire->id == $fiche->beneficiaire_id ? 'selected' : ''}}> {{ $beneficiaire-> nom }} {{ $beneficiaire-> prenom }} </option>
                        @endforeach
                    </select>
                    @if($errors->has('beneficiaire'))
                    <div class="text-danger ">{{ $errors->first('beneficiaire') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="montant_aide" class="form-label">Montant de l'aide*</label>
                    <input type="number" class="form-control {{ $errors->has('montant_aide') ? 'is-invalid' : '' }}" id="montant_aide" name="montant_aide" value="{{$fiche->montant_aide}}">
                    @if($errors->has('montant_aide'))
                    <div class="text-danger ">{{ $errors->first('montant_aide') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Mots clés (Tags)</label>
                    <input type="text" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" id="tags" name="tags" value="{{$fiche->tags}}">
                    @if($errors->has('tags'))
                    <div class="text-danger ">{{ $errors->first('tags') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="commentaire" class="form-label">Commentaire</label>
                    <textarea class="form-control" rows="5" name="commentaire"> {{$fiche->commentaire}}</textarea>
                    @if($errors->has('commentaire'))
                    <div class="text-danger ">{{ $errors->first('commentaire') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf">
                    @if($errors->has('pdf'))
                    <div class="text-danger ">{{ $errors->first('pdf') }}</div>
                    @endif
                </div>

                <input type="hidden" name="nom_url" value="{{ $fiche->url_pdf }}">
                <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
                <p class="mb-3"> *Champ non obligatoire </p>
            </form>
        </div>

        <div class="col">
            <iframe class="w-100 h-100" src="{{ asset('storage/pdf/'.$fiche->url_pdf) }}"></iframe>
        </div>
    </div>
</div>
@endsection('content')

@push('scripts')
<script src="{{asset('javascript/script.js')}}">
</script>
@endpush