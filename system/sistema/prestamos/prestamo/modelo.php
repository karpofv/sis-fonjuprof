<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $codigo = $_POST[codigo];
    $descripcion = $_POST[descripcion];
    $amortizacion = $_POST[amortizacion];
    $interes = $_POST[interes];
    $cuotas = $_POST[cuotas];
    $limite = $_POST[limite];
    if($editar==1 and $codigo=="" and $descripcion!=""){
        if($cuotas<1){
            paraTodos::alerta("Debe introducir al menos 1 cuota");
            exit;
        }
        $insertar = paraTodos::arrayInserte("prest_descripcion, prest_amortcodigo, prest_interes, prest_cuotas, prest_limite", "prestamos", "'$descripcion', $amortizacion,'$interes', '$cuotas', '$limite'");
        if($insertar){
            paraTodos::alerta("Registro exitoso");
            $codigo="";
            $descripcion="";
            $amortizacion = "";
            $interes = "";
            $cuotas = "";
            $limite = "";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion!=""){
        if($cuotas<1){
            paraTodos::alerta("Debe introducir al menos 1 cuota");
            exit;
        }        
        $update = paraTodos::arrayUpdate("prest_descripcion='$descripcion', prest_amortcodigo='$amortizacion', prest_interes='$interes', prest_cuotas='$cuotas', prest_limite='$limite'", "prestamos", "prest_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa");
            $codigo="";
            $descripcion="";
            $amortizacion = "";
            $interes = "";
            $cuotas = "";
            $limite = "";
        }
    }
    if($eliminar==1 and $codigo!=""){
        $delete = paraTodos::arrayDelete("prest_codigo=$codigo", "prestamos");
        if($delete){
            paraTodos::alerta("Registro eliminado");
            $codigo="";
            $descripcion="";
            $amortizacion = "";
            $interes = "";
            $cuotas = "";
            $limite = "";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion==""){
        $consuldescrip = paraTodos::arrayConsulta("prest_descripcion, prest_amortcodigo, prest_interes, prest_cuotas, prest_limite", "prestamos", "prest_codigo=$codigo");
        foreach($consuldescrip as $row){
            $descripcion=$row[prest_descripcion];
            $amortizacion =$row[prest_amortcodigo];
            $interes =$row[prest_interes];
            $cuotas =$row[prest_cuotas];
            $limite =$row[prest_limite];
        }
    }
    $consuldescripcion = paraTodos::arrayConsulta("*", "prestamos p, config_amort ca", "p.prest_amortcodigo=ca.amort_codigo");
?>