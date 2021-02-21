$("#adresse").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?q="+$("input[name='adresse']").val(),
            data: { q: request.term },
            dataType: "json",
            success: function (data) {
                response($.map(data.features, function (item) {
                    return { label: item.properties.name, value: item.properties.name};
                }));
            }
        });
    }
});

// $("#adresse").click(function(){
//     console.log('ok');
// })

