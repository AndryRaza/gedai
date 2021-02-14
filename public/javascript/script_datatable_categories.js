$(document).ready(function(){

    $('#laravel_datatable').DataTable({
        processing:false,
        serverSide: false,
        responsive:true,
        dom: 'Bfrtip',
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
        },
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
        ajax:'/categorie-list'
           
         ,
        columns:[
            {data: 'id', name:'id'},
            {data: 'categorie', name:'categorie'},
            {data: 'created_at', name:'created_at'},
            {data: 'modifier', name:'modifier', orderable:false, searchable:false},
            {data: 'désactiver', name:'désactiver', orderable:false, searchable:false},
        ]
    })

 


})
