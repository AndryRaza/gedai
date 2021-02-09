$(document).ready(function(){

    $('#laravel_datatable').DataTable({
        processing:false,
        serverSide: false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
        },
        
        responsive:true,
        dom: 'Bfrtip',
        ajax:'/utilisateur-list',
      /*  buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],*/
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 lignes', '25 lignes', '50 lignes', 'Tout montrer' ]
        ],
        buttons: ['pageLength',{
            extend: "pdf",
            title: "Test",
            filename: "customized_pdf_file_name"
            }, {
            extend: "excel",
            title: "Customized EXCEL Title",
            filename: "customized_excel_file_name"
            }, {
            extend: "csv",
            filename: "customized_csv_file_name"
            }],
     
        columns:[
            {data:'voir', name:'voir', orderable:false, searchable:false},
            {data: 'id', name:'id'},
            {data: 'created_at', name:'created_at'},
            //{data: 'updated_at', name:'updated_at'},
            {data: 'role', name:'role'},
            {data: 'service_id', name:'service'},
            {data: 'nom', name:'nom'},
            {data: 'prenom', name:'prenom'},
            {data: 'email', name:'email'},
           // {data: 'telephone', name:'telephone'},
            {data: 'etat', name:'etat'},
            {data: 'modifier', name:'modifier', orderable:false, searchable:false},
            {data: 'désactiver', name:'désactiver', orderable:false, searchable:false},
        ]
    })
})
