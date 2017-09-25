<?php
    $consuldatos = paraTodos::arrayConsulta("*", "asociado, config_nomina,config_banco,config_vicerrectorado", "asoc_cedula=$_SESSION[ci] and asoc_nomcodigo=nom_codigo and ban_codigo=asoc_banco and vic_codigo=asoc_viccodigo");
    foreach($consuldatos as $datos){
        $nombre = $datos[asoc_nombres];
        $apellido = $datos[asoc_apellidos];
        $direccion = $datos[asoc_direccion];
        $telefono = $datos[asoc_telefono];
        $correo = $datos[asoc_correo];
        $nomina = $datos[nom_descripcion];
        $cuenta = $datos[asoc_cuenta];
        $fecing = $datos[asoc_fecing];
        $banco = $datos[ban_descripcion];
        $vicerrectorado = $datos[vic_descripcion];
    }
?>