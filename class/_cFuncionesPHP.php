<?php

class _cFuncionesPHP {



    public static function pre($variable,$titulo="",$color="#000"){
        echo "<br/><pre style='color: ".$color."'>".$titulo." ";
        print_r($variable);
        echo "</pre>";
    }

    public static function pred($variable,$titulo="",$color="#000"){

        global $time_pre;
        echo "<br/><pre style='color: ".$color."'><b>".$titulo."</b> ";
        print_r($variable);
        echo "</pre>";
        $time_post = microtime(true);
        $exec_time = $time_post - $time_pre;
        if($exec_time > 1000) $exec_time = 0;

        die("<br/><span style='color:red;font-weight: bold;'>Ejecución detenida a elección del ADMIN &nbsp;&nbsp;&nbsp; ".number_format($exec_time,4)."seg.</span>");
    }


}
?>