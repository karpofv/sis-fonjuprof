<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $codigo = $_POST[codigo];
    $fecdesde = $_POST[fecdesde];
    $fechasta = $_POST[fechasta];
    $selvice = $_POST[selvice];
    $seltipopres = $_POST[seltipopres];
    $oferta = $_POST[oferta];
    if($editar==1 and $codigo=="" and $oferta!=""){
        if($oferta<1){
            paraTodos::alerta("Debe al menos ofertar un prestamo");
            exit;
        }
        $insertar = paraTodos::arrayInserte("col_viccodigo, col_fecdesde,col_fechasta,col_prestcodigo, col_cantidad", "prestamos_cola", "$selvice,'$fecdesde','$fechasta',$seltipopres,$oferta");
        if($insertar){
            paraTodos::alerta("Registro exitoso");
            $codigo="";
            $selvice = "";
            $fecdesde = "";
            $fechasta = "";
            $seltipopres = "";
            $oferta = "";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion!=""){
        if($oferta<1){
            paraTodos::alerta("Debe al menos ofertar un prestamo");
            exit;
        }        
        $update = paraTodos::arrayUpdate("col_viccodigo='$selvice', col_fecdesde='$fecdesde',col_fechasta='$fechasta',col_prestcodigo='$seltipopres', col_cantidad='$oferta'", "prestamos_cola", "col_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa");
            $codigo="";
            $selvice = "";
            $fecdesde = "";
            $fechasta = "";
            $seltipopres = "";
            $oferta = "";            
        }
    }
    if($eliminar==1 and $codigo!=""){
        $delete = paraTodos::arrayDelete("col_codigo=$codigo", "prestamos_cola");
        if($delete){
            paraTodos::alerta("Registro eliminado");
            $codigo="";
            $selvice = "";
            $fecdesde = "";
            $fechasta = "";
            $seltipopres = "";
            $oferta = "";
        }
    }
    if($editar==1 and $codigo!="" and $descripcion==""){
        $consuldescrip = paraTodos::arrayConsulta("*", "prestamos_cola", "col_codigo=$codigo");
        foreach($consuldescrip as $row){
            $selvice = $row[col_viccodigo];
            $fecdesde = $row[col_fecdesde];
            $fechasta = $row[col_fechasta];
            $seltipopres = $row[col_prestcodigo];
            $oferta = $row[col_cantidad];
        }
    }
    $consuldescripcion = paraTodos::arrayConsulta("*", "prestamos_cola pc, config_ubicacion cv, prestamos p", "col_viccodigo=ubic_codigo and col_prestcodigo=prest_codigo order by col_fecdesde desc");
?>