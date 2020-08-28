$(document).ready(function(){

    $('.btnAnketa').click(function(){
        var idAnketa = $(this).attr('data-id');
        var izb = $('#ddl' + idAnketa).val();

        //alert("Izabrana opcija je " + izb);

        $.ajax({
            url: "php/anketa.php",
            type: 'post',
            data: {
                anketa: true,
                idAnketa: idAnketa,
                idOdgovor: izb
            },
            success: function(data)
            {
                console.log(data);
                var tmp = "<ul start='1'>";
                data = JSON.parse(data);
                for(var i in data)
                {
                    tmp += "<li>" + data[i] + "</li>";
                }
                tmp += "</ul>";
                $('.feedback' + idAnketa).html(tmp);
                
            },
            error: function(xhr)
            {
                console.log(xhr);
            }
        })
    })

})
