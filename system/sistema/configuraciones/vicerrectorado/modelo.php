<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $codigo = $_POST[codigo];
    $descripcion = $_POST[descripcion];
    if($editar==1 and $codigo=="" and $descripcion!=""){
        $insertar = paraTodos::arrayInserte("ubic_descripcion", "config_ubicacion", "'$descripcion'");
        if($insertar){
            paraTodos::alerta("Registro exitoso");
            $codigo="";
            $descripcion="";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion!=""){
        $update = paraTodos::arrayUpdate("ubic_descripcion='$descripcion'", "config_ubicacion", "ubic_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa");
            $codigo="";
            $descripcion="";            
        }
    }
    if($eliminar==1 and $codigo!=""){
        $delete = paraTodos::arrayDelete("ubic_codigo=$codigo", "config_ubicacion");
        if($delete){
            paraTodos::alerta("Registro eliminado");
            $codigo="";
            $descripcion="";            
        }
    }
    if($editar==1 and $codigo!="" and $descripcion==""){
        $consuldescrip = paraTodos::arrayConsulta("ubic_descripcion", "config_ubicacion", "ubic_codigo=$codigo");
        foreach($consuldescrip as $row){
            $descripcion=$row[ubic_descripcion];
        }
    }
    $consuldescripcion = paraTodos::arrayConsulta("*", "config_ubicacion", "1=1");
?>