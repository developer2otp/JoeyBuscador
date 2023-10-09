<?php

  header('X-Content-Type-Options: nosniff');
  header('X-Frame-Options: SAMEORIGIN');
  header_remove("X-Powered-By");
  header("Cache-Control: no-cache, max-age=3600, no-store");
  header("Pragma: no-cache");
  date_default_timezone_set('America/Caracas');

  class Connection extends PDO {

    private $tipo_de_base = 'mysql';
    private $host = '5.161.186.173';
    private $usuario = 'ConsultaPrecio';
    private $contrasena = 'Ejvr1395**';
    private $nombre_de_base = 'verufact_shiliquitas';
      
    public function __construct() {
      try{
        parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        $resultado = new stdClass();
        $resultado->result = FALSE;
        $resultado->icono = "error";
        $resultado->titulo = "Error!";
        $resultado->mensaje = "Ha surgido un error y no se puede conectar a la base de datos.";
        $resultado->debug = $e->getMessage();
        echo json_encode($resultado);
        exit;
      }
    }
  }
  
?>
