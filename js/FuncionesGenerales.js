window.onload = BloquearPantalla();

function contenidoMain(data, urlControlador) {

    let obj = JSON.parse(data);

    if (urlControlador == "modulos/Productos/controller/Productos_BuscarItemLike.php") {    

        if(obj.result == true){

            if(obj.data.length > 0){

                let t = $('#TablaIndormacion').DataTable().clear().draw();

                for (let j = 0; j < obj.data.length; j++) {

                    let rowNode = t.row.add([obj.data[j]['barcode'], obj.data[j]['name'], 'S/ '+number_format(obj.data[j]['sale_unit_price'], 2, '.', ',')]).draw().node();
                    $(rowNode).find('td').addClass('text-center');

                }

            }else{

                $('#principal').empty();
                $('#principal').html('no hay registros');

            }

        }else{

            $('#principal').empty();
            $('#principal').html('no hay registros');

        }

    }

}

function rellenarMain(url, id, urlControlador) {

    let ajax_data = { "id": id};
    $.ajax({
        type: "POST",
        url: url,
        data: ajax_data,
        async: false, // esperar la respuesta de la solicitud
        success: function (data) {
            contenidoMain(data, urlControlador);
        },
        error: function (error) {
            Swal.fire(error.titulo, error.mensaje, error.icono);
        }
    });

}

// Formater números, dar formato de cantidades
function number_format(number, decimals, dec_point, thousands_sep) {

    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


function BloquearPantalla(){

    window.scrollTo(0, 0);
    $(".loader-page").css({
      'visibility': "visible",
      'opacity': "1"
    });

}

$(document).ready(function () {
  
    setTimeout(function(){
  
      window.scrollTo(0, 0);
      $(".loader-page").css({
        'visibility': "hidden",
        'opacity': "0"
      });
  
    }, 1000);
    
});