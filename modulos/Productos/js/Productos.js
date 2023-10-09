$("#ConsultarItem").on('keyup', function (e) {

    let StringText = $("#ConsultarItem").val();
    rellenarMain('modulos/Productos/controller/Productos_BuscarItemLike.php', StringText, 'modulos/Productos/controller/Productos_BuscarItemLike.php');

});