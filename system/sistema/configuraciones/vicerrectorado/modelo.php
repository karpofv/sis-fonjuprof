<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $codigo = $_POST[codigo];
    $descripcion = $_POST[descripcion];
    if($editar==1 and $codigo=="" and $descripcion!=""){
        $insertar = paraTodos::arrayInserte("vic_descripcion", "config_vicerrectorado", "'$descripcion'");
        if($insertar){
            paraTodos::alerta("Registro exitoso");
            $codigo="";
            $descripcion="";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion!=""){
        $update = paraTodos::arrayUpdate("vic_descripcion='$descripcion'", "config_vicerrectorado", "vic_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa");
            $codigo="";
            $descripcion="";            
        }
    }
    if($eliminar==1 and $codigo!=""){
        $delete = paraTodos::arrayDelete("vic_codigo=$codigo", "config_vicerrectorado");
        if($delete){
            paraTodos::alerta("Registro eliminado");
            $codigo="";
            $descripcion="";            
        }
    }
    if($editar==1 and $codigo!="" and $descripcion==""){
        $consuldescrip = paraTodos::arrayConsulta("vic_descripcion", "config_vicerrectorado", "vic_codigo=$codigo");
        foreach($consuldescrip as $row){
            $descripcion=$row[vic_descripcion];
        }
    }
    $consuldescripcion = paraTodos::arrayConsulta("*", "config_vicerrectorado", "1=1");
?>