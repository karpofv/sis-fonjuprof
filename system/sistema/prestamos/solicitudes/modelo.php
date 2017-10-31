<?php
    $opcion= $_POST[actd];
    $status= $_POST[status];
    $codigo= $_POST[codigo];
    if($opcion!=""){
        if($opcion==1){
            paraTodos::arrayUpdate("sol_status=$status", "solicitudes", "sol_codigo=$codigo");
        }
    }
?>