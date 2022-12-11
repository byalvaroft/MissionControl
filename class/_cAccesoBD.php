<?php

const SERVIDORBD = "localhost";
const USUARIOBD = "apolloairways";
const CLAVEBD = "abc123.";
const BASEDATOS = "apolloairways_db";

class _cAccesoBD
{

    protected $idconexion;
    protected $errormsg;

    protected function __construct($servidor, $usuariodb, $clave, $basedatos)
    {

        $this->errormsg = "";

        $this->idconexion = mysqli_connect($servidor, $usuariodb, $clave, $basedatos) or die("Error de conexion con MySQL Server");
        if (!$this->idconexion) {
            $this->errormsg = "Fallo al conectar a MySQL: " . mysqli_connect_error();
            echo $this->errormsg;
        }

        $_SESSION['conexion'] = $this;

        return $this;
    }

    public static function obtener()
    {
        unset($_SESSION['conexion']);

        if (!isset($_SESSION['conexion']) || $_SESSION['conexion'] == null || $_SESSION['conexion']->idconexion == false) {

            $con = new _cAccesoBD(SERVIDORBD, USUARIOBD, CLAVEBD, BASEDATOS);

        } else {

            $con = $_SESSION['conexion'];

        }


        return $con;
    }

    public function _EjecutarQuery($sql)
    {

        if ($resultado = mysqli_query($this->idconexion, $sql)) {

            return $resultado;


        } else {

            $this->errormsg = "Error Mysql: " . mysqli_error($this->idconexion);
            return false;
        }
    }


    public function fetch_object($query_id, $class_name = null, $params = null)
    {

        if ($class_name == null)
            return $query_id->fetch_object();
        else return $query_id->fetch_object($class_name, $params);

    }

    public function num_rows($result)
    {
        return ($result) ? $result->num_rows : 0;
    }


    public function ultimoInsertado()
    {
        return $this->idconexion->insert_id;
    }
}


?>