@extends('layout_utilisateur')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/fiches">Fiches</a></li>
        <li class="breadcrumb-item"><a href="{{route('fiches.create')}}">Ajouter une fiche</a></li>
    </ol>
</nav>

<h1 class="text-center my-3">Créer une fiche</h1>

<div class="">

    <h2 class="text-center mt-2">Choisir le pdf à afficher</h2>

    <div class=" d-flex justify-content-center mb-5">
        <form id="form">
            @csrf
            <div class="mb-3">
                <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf">
                @if($errors->has('pdf'))
                <div class="text-danger ">{{ $errors->first('pdf') }}</div>
                @endif
            </div>
            <span class="d-flex justify-content-center"><button type="submit" class="btn btn-primary " id="send_pdf" onclick="envoyer()">Afficher</button></span>
        </form>
    </div>


    <div class="row row-cols-1" id="affichage_formulaire">
        <div class="col" id="formulaire_fiche" style="display:none">
            <form action="{{ route('fiches.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="date_enregistrement" class="form-label">Date d'enregistrement</label>
                    <input type="date" class="form-control {{ $errors->has('date_enregistrement') ? 'is-invalid' : '' }}" id="date_enregistrement" name="date_enregistrement" value="{{old('date_enregistrement')}}">
                    @if($errors->has('date_enregistrement'))
                    <div class="text-danger ">{{ $errors->first('date_enregistrement') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="date_acte" class="form-label">Date de l'acte</label>
                    <input type="date" class="form-control {{ $errors->has('date_acte') ? 'is-invalid' : '' }}" id="date_acte" name="date_acte" value="{{old('date_acte')}}">
                    @if($errors->has('date_acte'))
                    <div class="text-danger ">{{ $errors->first('date_acte') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="numero_acte" class="form-label">Numéro de l'acte</label>
                    <input type="text" class="form-control {{ $errors->has('numero_acte') ? 'is-invalid' : '' }}" id="numero_acte" name="numero_acte" value="{{old('numero_acte')}}">
                    @if($errors->has('numero_acte'))
                    <div class="text-danger ">{{ $errors->first('numero_acte') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="nature_acte" class="form-label">Nature de l'acte</label>
                    <select class="form-control" id="nature_acte" name="nature_acte">
                        @foreach($nature_actes as $nature)
                        <option value="{{ $nature -> id}}" {{$nature->id == old('nature_acte') ? 'selected' : ''}}> {{ $nature-> acte }}</option>
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
                        <option value="{{ $categorie -> id}}" {{$categorie->id == old('categorie_acte') ? 'selected' : ''}}> {{ $categorie-> categorie }}</option>
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
                    </select>
                    @if($errors->has('type_acte'))
                    <div class="text-danger ">{{ $errors->first('type_acte') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                    <select class="form-control" id="beneficiaire" name="beneficiaire">
                        @foreach($beneficiaires as $beneficiaire)
                        <option value="{{ $beneficiaire -> id}}" {{$beneficiaire->id == old('beneficiaire') ? 'selected' : ''}}> {{ $beneficiaire-> nom }} {{ $beneficiaire-> prenom }} </option>
                        @endforeach
                    </select>
                    @if($errors->has('beneficiaire'))
                    <div class="text-danger ">{{ $errors->first('beneficiaire') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="montant_aide" class="form-label">Montant de l'aide*</label>
                    <input type="number" class="form-control {{ $errors->has('montant_aide') ? 'is-invalid' : '' }}" id="montant_aide" name="montant_aide" value="{{old('montant_aide')}}">
                    @if($errors->has('montant_aide'))
                    <div class="text-danger ">{{ $errors->first('montant_aide') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Mots clés (Tags)</label>
                    <input type="text" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" id="tags" name="tags" value="{{old('tags')}}">
                    @if($errors->has('tags'))
                    <div class="text-danger ">{{ $errors->first('tags') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="commentaire" class="form-label">Commentaire</label>
                    <textarea class="form-control" rows="5" name="commentaire">{{old('commentaire')}}</textarea>


                    @if($errors->has('commentaire'))
                    <div class="text-danger ">{{ $errors->first('commentaire') }}</div>
                    @endif
                </div>

                <!--
                
                -->
                <div id="nom_pdf"></div>
                <span class="d-flex justify-content-end"> <button type="submit" class="btn btn-primary mb-2">Enregistrer</button> </span>
                <p class="mb-3"> *Champ non obligatoire </p>
            </form>
        </div>

        <div class="col" id="affichage_pdf">
            <!--
           
            -->
        </div>

    </div>
</div>

@endsection

@push('scripts')
<!--
<script src="{{asset('javascript/script.js')}}">

</script>
-->



<script>
    $('#categorie_acte').change(function() {
        var value = $('#categorie_acte').val();
        $.ajax({
            url: "/create/selection_utilisateur/" + value,
            type: 'GET',
            data: {},
            dataType: 'JSON',
            success: function(data) {
                txt = "";
                for (i = 0; i < data.length; i++) {
                    txt = txt + `<option value="` + data[i]['id'] + `">` + data[i]['sous_categorie'] + `</option>`;
                }
                document.getElementById('type_acte').innerHTML = txt;
            },
            error: function(e) {
                console.log('fail');
            }
        })
    });

    function envoyer() {
        event.preventDefault();
        if (document.getElementById("pdf").value != "") {
            var form = $('#form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "/store_pdf",
                type: 'POST',
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(reponse) {
                    document.getElementById('nom_pdf').innerHTML = `<input type="hidden" name="nom_pdf" value="` + reponse + `">`
                    document.getElementById('affichage_pdf').innerHTML = ` <iframe class="w-100 h-100" src="{{asset('storage/temp_pdf/` + reponse + `')}}"></iframe>`
                    document.getElementById('affichage_formulaire').className += ' row-cols-md-2';
                    document.getElementById('formulaire_fiche').style.display = 'block';
                }
            });
        }
    }
</script>
@endpush