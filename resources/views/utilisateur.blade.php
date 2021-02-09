<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Page d'accueil</title>
</head>

<body>

<div class="d-flex justify-content-center align-items-center " style="height:90vh">

    <form class="p-5 border border-primary" action="/utilisateur_service" method="post">
        <h2 class="mb-3">Choissisez votre service</h2>

        @csrf

        <select class="form-select mb-3" name="services" id="services">
            @foreach($services as $service)
            <option value="{{ $service->id}}">{{ $service-> service }}</option>
            @endforeach
        </select>

    <span class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Valider</button> </span>
    </form>

</div>


</body>

</html>
