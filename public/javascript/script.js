$(document).ready(function () {


    $('#categorie_acte').change(function () {
        var value = $('#categorie_acte').val();
        $.ajax({
            url: "/create/selection/" + value,
            type: 'GET',
            data: {},
            dataType: 'JSON',
            success: function (data) {
                txt = "";
                for (i = 0; i < data.length; i++) {
                    txt = txt + `<option value="` + data[i]['id'] + `">` + data[i]['sous_categorie'] + `</option>`;
                }
                document.getElementById('type_acte').innerHTML = txt;
            },
            error: function (e) {
                console.log('fail');
            }
        })
    });

    $('#stats_type').change(function () {
        var value = $('#stats_type').val();
        $.ajax({
            url: "/administration/stat/" + value,
            type: 'GET',
            data: {},
            dataType: 'JSON',
            success: function (data) {
                txt = "";
                for (i = 0; i < data[0].length; i++) {
                    txt = txt + `<tr> <td>` + data[0][i]['sous_categorie'] + `</td>` +
                        `<td class="text-center">` + data[1][i] +  ` </td> ` +  
                        `<td class="text-center">` + data[2][i] +  ` </td> ` +  
                        `</tr>`;
                }
                document.getElementById('table_stat').innerHTML = txt;

                sme=0;
                sme_ = 0;
                for (i=0;i<data[0].length;i++){
                    sme = sme + data[1][i];
                    sme_ =  Math.floor(sme_ + data[2][i]);
                }

                document.getElementById('total_stat').innerHTML = 
                `<tr class="table-secondary" style="font-size:20px" ><td class="d-flex justify-content-end" >Total</td>` + `<td class="text-center">` + sme + `</td>` + `<td class="text-center">` + sme_ + `</td></tr>`

            },
            error: function (e) {
                console.log('fail');
            }
        })
    });

    

    
})