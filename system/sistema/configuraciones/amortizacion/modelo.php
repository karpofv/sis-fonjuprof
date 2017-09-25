<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $codigo = $_POST[codigo];
    $descripcion = $_POST[descripcion];
    if($editar==1 and $codigo=="" and $descripcion!=""){
        $insertar = paraTodos::arrayInserte("amort_descripcion", "config_amort", "'$descripcion'");
        if($insertar){
            paraTodos::alerta("Registro exitoso");
            $codigo="";
            $descripcion="";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion!=""){
        $update = paraTodos::arrayUpdate("amort_descripcion='$descripcion'", "config_amort", "amort_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa");
            $codigo="";
            $descripcion="";            
        }
    }
    if($eliminar==1 and $codigo!=""){
        $delete = paraTodos::arrayDelete("amort_codigo=$codigo", "config_amort");
        if($delete){
            paraTodos::alerta("Registro eliminado");
            $codigo="";
            $descripcion="";            
        }
    }
    if($editar==1 and $codigo!="" and $descripcion==""){
        $consuldescrip = paraTodos::arrayConsulta("amort_descripcion", "config_amort", "amort_codigo=$codigo");
        foreach($consuldescrip as $row){
            $descripcion=$row[amort_descripcion];
        }
    }
    $consuldescripcion = paraTodos::arrayConsulta("*", "config_amort", "1=1");
?>