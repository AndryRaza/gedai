<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Page de connexion</title>
</head>

<body>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="height:100vh">
        <form class="d-flex flex-column p-5 border border-primary " action="" method="post">
            {{ csrf_field() }}
            <h1 class="text-center mb-3">GEDAI</h1>
            <div class="container text-center mt-2 ">
                @include('flash::message')
            </div>
            <div class="mb-3">
                <label class="form-label">Adresse e-mail</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input class="form-control" type="password" name="password">
                @if($errors->has('password'))
                <p class="help is-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <button class="btn btn-primary mb-3" type="submit">Se connecter</button>
            <a href="/"> Retour à la connexion utilisateur </a>
        </form>
    </div>
</body>

</html>





@push('scripts')
<script>
</script>
@endpush