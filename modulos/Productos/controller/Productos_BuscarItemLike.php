<?php

    ini_set('memory_limit', '-1');
    set_time_limit(0);
    include '../../conexion.php';
    $conn = new Connection();
    $camporequerido = '';
    $valid = 0;

    try {

        if( isset($_POST['string']) ){

            $String = $_POST["string"];

            if (($string == null) || ($string == "")){
                $camporequerido = $camporequerido.","."string"; $valid=1;
            }

            if($valid == 0){

                // Mejorar Usando Creando SP
                $sql = $conn->query("SELECT * FROM items WHERE barcode LIKE '{$String}%' OR name LIKE '{$String}%'");
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);
                $sql->closeCursor();

                if ($sql->rowCount() > 0) {

                    $resultado = new stdClass();
                    $resultado->result = TRUE;
                    $resultado->icono = "success";
                    $resultado->titulo = "Felicidades!";
                    $resultado->mensaje = "¡Los datos han sido guardados correctamente!";
                    $resultado->data = $data;
                    echo json_encode($resultado);

                } else {

                    $resultado = new stdClass();
                    $resultado->result = FALSE;
                    $resultado->icono = "warning";
                    $resultado->titulo = "Oops!";
                    $resultado->mensaje = "¡No posee registros!";
                    $resultado->data = [];
                    echo json_encode($resultado);

                }

            }else{

                $resultado = new stdClass();
                $resultado->result = FALSE;
                $resultado->icono = "warning";
                $resultado->titulo = "Error!";
                $resultado->mensaje = "Las variables se encuentra vacias: ".trim($camporequerido, ',');
                echo json_encode($resultado);

            }
        }else{
            if ( !isset($_POST['string']) ){
                $camporequerido = $camporequerido.","."string";
            }

            $resultado = new stdClass();
            $resultado->result = FALSE;
            $resultado->icono = "warning";
            $resultado->titulo = "Error!";
            $resultado->mensaje = "Las variables son requeridas: ".trim($camporequerido, ',');
            echo json_encode($resultado);
        }
    } catch (PDOException $error) {
        
        $resultado = new stdClass();
        $resultado->result = FALSE;
        $resultado->icono = "error";
        $resultado->titulo = "Error!";
        $resultado->mensaje = "Problemas PDOException";
        $resultado->debug = $error->getMessage();
        echo json_encode($resultado);

    } catch (Exception $error) {

        $resultado = new stdClass();
        $resultado->result = FALSE;
        $resultado->icono = "error";
        $resultado->titulo = "Error!";
        $resultado->mensaje = "Problemas Exception";
        $resultado->debug = $error->getMessage();
        echo json_encode($resultado);

    }

?>