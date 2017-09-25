<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $codigo = $_POST[codigo];
    $descripcion = $_POST[descripcion];
    if($editar==1 and $codigo=="" and $descripcion!=""){
        $insertar = paraTodos::arrayInserte("nom_descripcion", "config_nomina", "'$descripcion'");
        if($insertar){
            paraTodos::alerta("Registro exitoso");
            $codigo="";
            $descripcion="";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion!=""){
        $update = paraTodos::arrayUpdate("nom_descripcion='$descripcion'", "config_nomina", "nom_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa");
            $codigo="";
            $descripcion="";            
        }
    }
    if($eliminar==1 and $codigo!=""){
        $delete = paraTodos::arrayDelete("nom_codigo=$codigo", "config_nomina");
        if($delete){
            paraTodos::alerta("Registro eliminado");
            $codigo="";
            $descripcion="";            
        }
    }
    if($editar==1 and $codigo!="" and $descripcion==""){
        $consuldescrip = paraTodos::arrayConsulta("nom_descripcion", "config_nomina", "nom_codigo=$codigo");
        foreach($consuldescrip as $row){
            $descripcion=$row[nom_descripcion];
        }
    }
    $consuldescripcion = paraTodos::arrayConsulta("*", "config_nomina", "1=1");
?>