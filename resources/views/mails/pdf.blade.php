


<h1>Liste des fiches</h1>
<table >
  <thead >
    <tr>
      <th >ID</th>
      <th >Créée le </th>
      <th >Modifiée le </th>
      <th >Service</th>
      <th>Auteur</th>
      <th >Catégorie</th>
      <th >Sous-Catégorie</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $fiche)
      <tr>
        <td>{{ $fiche->id }}</td>
        <td>{{ $fiche->created_at }}</td>
        <td>{{ $fiche->updated_at }}</td>
        <td>{{ $fiche->service-> service}}</td>
        <td>{{ $fiche->utilisateur->nom }} {{$fiche->utilisateur->prenom}}</td>
        <td>{{ $fiche->categorie->categorie }}</td>
        <td>{{ $fiche->sous_categorie-> sous_categorie}}</td>
      </tr>
    @endforeach
  </tbody>
</table>

