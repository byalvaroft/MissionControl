<?php

// Clase que contiene funciones utilitarias en PHP
class _cFuncionesPHP {

    // Función para visualizar variables con formato en HTML
    public static function pre($variable, $titulo="", $color="#000"){
        // Imprime la variable con formato y el título si se proporciona
        echo "<br/><pre style='color: ".$color."'>".$titulo." ";
        print_r($variable);
        echo "</pre>";
    }

    // Función similar a 'pre', pero detiene la ejecución del script al finalizar
    public static function pred($variable, $titulo="", $color="#000"){
        // Variable global para medir el tiempo de ejecución
        global $time_pre;

        // Imprime la variable con formato y el título si se proporciona
        echo "<br/><pre style='color: ".$color."'><b>".$titulo."</b> ";
        print_r($variable);
        echo "</pre>";

        // Calcula el tiempo de ejecución y detiene el script
        $time_post = microtime(true);
        $exec_time = $time_post - $time_pre;
        if($exec_time > 1000) $exec_time = 0;

        die("<br/><span style='color:red;font-weight: bold;'>Ejecución detenida a elección del ADMIN &nbsp;&nbsp;&nbsp; ".number_format($exec_time,4)."seg.</span>");
    }
}
?>
