<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscado Precio</title>

    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/tables/datatables.min.css" type="text/css" rel="stylesheet">
    <link href="css/tables/responsive.dataTables.min.css" type="text/css" rel="stylesheet">
    <link href="css/General.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery.js"></script>
    <script src="js/FuncionesGenerales.js"></script>
    <script src="js/jquery.blockUI.js"></script>
    <script src="js/sweetalert.min.js"></script>

</head>
<body>

<body id='app' class="container-fluid px-0">

    <div class="loader-page">
        <img class="imgPrelouder" src="resources/img/loading_personalizado.gif">
    </div>
    
    <div class="container">

        <div class="row text-center align-items-center justify-content-center my-4">
            <input type="text" class="form-control" id="ConsultarItem" autocomplete="off" placeholder="Consultar Precio... ">
        </div>

        <section id="basic-tabs-components">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">

                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
                                            CONSULTA PRECIO MARKET LAS SHILIQUITAS
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                        <div class="card-body">
                                            <div class="px-3 ">
                                                
                                                <table id="TablaIndormacion" class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Codigo de Barra </th>
                                                            <th class="text-center">Nombre</th>
                                                            <th class="text-center">Precio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            
    </div>

</body>

<script src="js/datatable/datatables.min.js" type="text/javascript"></script>
<!-- <script src="app-assets/js/data-tables/datatable-basic.js" type="text/javascript"></script>
<script src="app-assets/js/data-tables/datatable-advanced.js" type="text/javascript"></script> -->
<script src='modulos/Productos/js/Productos.js'></script>
</html>