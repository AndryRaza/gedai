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

$("#code_postal").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?postcode="+$("input[name='code_postal']").val(),
            data: { q: request.term },
            dataType: "json",
            success: function (data) {
                var postcodes = [];
                response($.map(data.features, function (item) {
                    // Ici on est obligé d'ajouter les CP dans un array pour ne pas avoir plusieurs fois le même
                    if ($.inArray(item.properties.postcode, postcodes) == -1) {
                        postcodes.push(item.properties.postcode);
                        return { label: item.properties.postcode + " - " + item.properties.city, 
                                 city: item.properties.city,
                                 value: item.properties.postcode
                        };
                    }
                }));
            }
        });
    },
    // On remplit aussi la ville
    select: function(event, ui) {
        $('#ville').val(ui.item.city);
    }
});

