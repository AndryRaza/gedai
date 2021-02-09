$(document).ready(function () {

  $('#laravel_datatable').DataTable({
    processing: false,
    serverSide: false,
    responsive: true,
    dom: 'Bfrtip',
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
    },
    lengthMenu: [
      [10, 25, 50, -1],
      ['10 lignes', '25 lignes', '50 lignes', 'Tout montrer']
    ],
    buttons: ['pageLength', {
      extend: "pdfHtml5",
      title: "Test",
      orientation: 'landscape',
      filename: "customized_pdf_file_name",
      pageSize: "A3",
      download: "open"
    }, {
        extend: "excel",
        title: "Customized EXCEL Title",
        filename: "customized_excel_file_name"
      }, {
        extend: "csv",
        filename: "customized_csv_file_name"
      }],
    ajax: '/fiche-list',
    columns: [
      { data: 'id', name: 'id' },
      /* {data: 'created_at', name:'created_at'},
       {data: 'updated_at', name:'updated_at'},*/
      { data: 'service_id', name: 'service_id' },
      { data: 'utilisateur_id', name: 'utilisateur_id' },
      { data: 'categorie_id', name: 'categorie_id' },
      { data: 'sous_categorie_id', name: 'sous_categorie_id' },
      { data: 'beneficiaire_id', name: 'beneficiaire_id' },
      { data: 'nature_acte_id', name: 'nature_acte_id' },
      /* {data: 'date_enregistrement', name:'date_enregistrement'},
       {data: 'date_acte', name:'date_acte'},*/
      { data: 'numero_acte', name: 'numero_acte' },
      { data: 'url_pdf', name: 'url_pdf' },
      /*  {data: 'montant_aide', name:'montant_aide'},
        {data: 'tags', name:'tags'},
        {data: 'commentaire', name:'commentaire'},*/
      //  {data : 'etat', name:'etat'},
    ]
  })
})
