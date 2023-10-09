window.onload = BloquearPantalla();

function contenidoMain(data, urlControlador) {

    let obj = JSON.parse(data);

    if (urlControlador == "modulos/Productos/controller/Productos_BuscarItemLike.php") {    

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