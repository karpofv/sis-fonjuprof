<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $codigo = $_POST[codigo];
    $descripcion = $_POST[descripcion];
    if($editar==1 and $codigo=="" and $descripcion!=""){
        $insertar = paraTodos::arrayInserte("ban_descripcion", "config_banco", "'$descripcion'");
        if($insertar){
            paraTodos::alerta("Registro exitoso");
            $codigo="";
            $descripcion="";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion!=""){
        $update = paraTodos::arrayUpdate("ban_descripcion='$descripcion'", "config_banco", "ban_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa");
            $codigo="";
            $descripcion="";            
        }
    }
    if($eliminar==1 and $codigo!=""){
        $delete = paraTodos::arrayDelete("ban_codigo=$codigo", "config_banco");
        if($delete){
            paraTodos::alerta("Registro eliminado");
            $codigo="";
            $descripcion="";            
        }
    }
    if($editar==1 and $codigo!="" and $descripcion==""){
        $consuldescrip = paraTodos::arrayConsulta("ban_descripcion", "config_banco", "ban_codigo=$codigo");
        foreach($consuldescrip as $row){
            $descripcion=$row[ban_descripcion];
        }
    }
    $consuldescripcion = paraTodos::arrayConsulta("*", "config_banco", "1=1");
?>