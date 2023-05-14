<?php

// Constantes de conexión a la base de datos
const SERVIDORBD = "localhost";
const USUARIOBD = "apolloairways";
const CLAVEBD = "abc123.";
const BASEDATOS = "apolloairways_db";

// Clase para acceso a la base de datos
class _cAccesoBD
{
    // Atributos de la clase
    protected $idconexion;
    protected $errormsg;

    // Constructor de la clase
    protected function __construct($servidor, $usuariodb, $clave, $basedatos)
    {
        $this->errormsg = "";
        
        // Conectar a la base de datos
        $this->idconexion = mysqli_connect($servidor, $usuariodb, $clave, $basedatos) or die("Error de conexion con MySQL Server");
        if (!$this->idconexion) {
            $this->errormsg = "Fallo al conectar a MySQL: " . mysqli_connect_error();
            echo $this->errormsg;
        }

        $_SESSION['conexion'] = $this;

        return $this;
    }

    // Método para obtener una instancia de conexión
    public static function obtener()
    {
        unset($_SESSION['conexion']);

        // Verificar si existe una conexión previa, en caso contrario crear una nueva
        if (!isset($_SESSION['conexion']) || $_SESSION['conexion'] == null || $_SESSION['conexion']->idconexion == false) {
            $con = new _cAccesoBD(SERVIDORBD, USUARIOBD, CLAVEBD, BASEDATOS);
        } else {
            $con = $_SESSION['conexion'];
        }

        return $con;
    }

    // Método para ejecutar una consulta SQL
    public function _EjecutarQuery($sql)
    {
        // Ejecutar consulta y almacenar resultados
        if ($resultado = mysqli_query($this->idconexion, $sql)) {
            return $resultado;
        } else {
            $this->errormsg = "Error Mysql: " . mysqli_error($this->idconexion);
            return false;
        }
    }

    // Método para obtener un objeto de una consulta SQL
    public function fetch_object($query_id, $class_name = null, $params = null)
    {
        if ($class_name == null)
            return $query_id->fetch_object();
        else return $query_id->fetch_object($class_name, $params);
    }

    // Método para obtener el número de filas de una consulta SQL
    public function num_rows($result)
    {
        return ($result) ? $result->num_rows : 0;
    }

    // Método para obtener el último ID insertado
    public function ultimoInsertado()
    {
        return $this->idconexion->insert_id;
    }
}

?>