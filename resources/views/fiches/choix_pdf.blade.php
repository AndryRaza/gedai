@extends('layout_utilisateur')

@section('content')

<h1 class="text-center mt-2">Choisir le pdf à télécharger</h1>

<div class=" d-flex justify-content-center">

    <form class="" action="/store_pdf" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf">
            @if($errors->has('pdf'))
            <div class="text-danger ">{{ $errors->first('pdf') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary m-auto">Continuer</button>
    </form>

</div>

@endsection('content')