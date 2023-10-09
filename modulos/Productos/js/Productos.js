$("#ConsultarItem").on('keyup', function (e) {

    let StringText = $("#ConsultarItem").val();

    if(StringText.length >= 3){

        rellenarMain('modulos/Productos/controller/Productos_BuscarItemLike.php', StringText, 'modulos/Productos/controller/Productos_BuscarItemLike.php');
    
    }

});