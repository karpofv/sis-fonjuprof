<?php
    /*Adaptacion solo para el sistema de fonjuprof por que no manejan varias instituciones*/
    $institucion = $_POST[institucion];
    $cedula = $_POST[cedula];
    $razon = $_POST[razon];
    $rif = $_POST[rif];
    $codigo = $_POST[codigo];
    $nombre = $_POST[nombre];
    $apellidos = $_POST[apellidos];
    $direccion = $_POST[direccion];
    $ubica = $_POST[ubica];
    $nomina = $_POST[selnomina];
    $condicion = $_POST[selcondicion];
    $telefono = $_POST[telefono];
    $fecnac = $_POST[fecnac];
    $ingreso = $_POST[fecingreso];
    $correo = $_POST[correo];
    $selbanco = $_POST[selbanco];
    $cuenta = $_POST[cuenta];
    $usuariouser = $_POST[usuariouser];
    $passworduser = md5($_POST[passworduser]);
    $niveluser = $_POST[niveluser];
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $opcion = $_POST[opcion];
    $actd = $_POST[actd];
    /*Opciones de modificacon sin recarga completa*/
    if($actd!=""){
        if($actd==1){
            $consultaubica = paraTodos::arrayConsulta("*", "config_ubicacion", "ubic_instcodigo=$institucion");
            $result = "<option value=''>Seleccione una opción</option>";
            foreach($consultaubica as $row){
                $result .= "<option value='$row[ubic_codigo]'>$row[ubic_descripcion]</option>";
            }
            echo $result;
            exit;
        }
        if($actd==2){
            $consultanomina = paraTodos::arrayConsulta("*", "config_nomina", "nom_instcodigo=$institucion");
            $result = "<option value=''>Seleccione una opción</option>";
            foreach($consultanomina as $row){
                $result .= "<option value='$row[nom_codigo]'>$row[nom_descripcion]</option>";
            }
            echo $result;
            exit;
        }
    }
    /*Datos personales*/
    if($opcion=="DP"){
        /*INSERTAR*/
        if($editar==1 and $codigo==""){
            $insertar=paraTodos::arrayInserte("cli_razon, cli_rif, cli_cedula, cli_fecnac, cli_nombres, cli_apellidos, cli_telefono, cli_direccion, cli_correo", "clientes", "'$razon', '$rif', '$cedula', '$fecnac', '$nombre','$apellidos', '$telefono', '$direccion', '$correo'");
            if($insertar){
                paraTodos::alerta("Registro exitoso");
                $razon = "";
                $rif = "";
                $cedula = "";
                $fecnac = "";
                $nombre = "";
                $apellidos = "";
                $telefono = "";
                $direccion = "";
                $correo = "";                
            }
        }
        /*EDITAR*/
        if($editar==1 and $codigo!="" and $nombre!=""){
            $update = paraTodos::arrayUpdate("cli_razon='$razon', cli_rif='$rif', cli_cedula='$cedula', cli_fecnac='$fecnac', cli_nombres='$nombre', cli_apellidos='$apellidos', cli_telefono='$telefono', cli_direccion='$direccion', cli_correo='$correo'", "clientes", "cli_codigo=$codigo");
            if($update){
                paraTodos::alerta("Actualización exitosa");
                $codigo = "";
                $razon = "";
                $rif = "";
                $cedula = "";
                $fecnac = "";
                $nombre = "";
                $apellidos = "";
                $telefono = "";
                $direccion = "";
                $correo = "";                
            }
        }
        /*ELIMINAR*/
        if($eliminar==1){
            $delete=paraTodos::arrayDelete("cli_codigo=$codigo", "clientes");
            if($delete){
                paraTodos::alerta("Registro eliminado");
                $codigo="";
            }
        }
    }
    if($opcion=="DB"){
        /*Se verifica si ya posee datos bancarios*/
        $valida = paratodos::arrayConsultanum("*", "cliente_banco", "clientb_clicodigo=$codigo");
        if($valida>0){
            $update = paraTodos::arrayUpdate("clientb_bancodigo='$selbanco', clientb_cuenta='$cuenta'","cliente_banco", "clientb_clicodigo=$codigo");
            if($update){
                paraTodos::alerta("Actualización exitosa");
                $selbanco="";
                $cuenta="";                
            }
        } else {
            $inserte = paraTodos::arrayInserte("clientb_clicodigo, clientb_bancodigo, clientb_cuenta", "cliente_banco", "$codigo, $selbanco, '$cuenta'");
            if($inserte){
                paraTodos::alerta("Registro exitoso");
                $selbanco="";
                $cuenta="";
            }
        }
    }
    if($opcion=="DN"){
        /*Se verifica si ya posee datos nominales*/
        $valida = paratodos::arrayConsultanum("*", "cliente_nomina", "clienn_clicodigo=$codigo");
        if($valida>0){
            $update = paraTodos::arrayUpdate("clienn_instcodigo=$institucion, clienn_ubiccodigo=$ubica, clienn_nomcodigo=$nomina, clienn_condcodigo=$condicion, clienn_fecingreso='$ingreso'","cliente_nomina", "clienn_clicodigo=$codigo");
            if($update){
                paraTodos::alerta("Actualización exitosa");
                $institucion="";
                $ubica="";                
                $nomina="";                
                $condicion="";                
                $ingreso="";
            }
        } else {
            $inserte = paraTodos::arrayInserte("clienn_clicodigo,clienn_instcodigo, clienn_ubiccodigo, clienn_nomcodigo, clienn_condcodigo, clienn_fecingreso", "cliente_nomina", "$codigo, $institucion, $ubica, $nomina,$condicion, '$ingreso'");
            if($inserte){
                paraTodos::alerta("Registro exitoso");
                $institucion="";
                $ubica="";                
                $nomina="";                
                $condicion="";                
                $ingreso="";
            }
        }
    }
    if($opcion=="DA"){
        /*Se verifica si ya posee datos de acceso*/
        $valida = paratodos::arrayConsultanum("*", "usuarios", "Cedula=$cedula");
        if($valida>0){
            $update = paraTodos::arrayUpdate("Usuario='$usuariouser', contrasena='$passworduser', Nivel=$niveluser","usuarios", "Cedula=$cedula");
            if($update){
                paraTodos::alerta("Actualización exitosa");
                $usuariouser="";
                $passworduser="";                
                $niveluser="";                
                $cedula="";
            }
        } else {
            paraTodos::alerta($niveluser);
            $inserte = paraTodos::arrayInserte("Cedula, Usuario, contrasena, Nivel, Tipo", "usuarios", "$cedula, '$usuariouser', '$passworduser', $niveluser, 'Empleado'");
            if($inserte){
                paraTodos::alerta("Registro exitoso");
                $usuariouser="";
                $passworduser="";                
                $niveluser="";                
                $cedula="";
            }
        }
    }
        /*MOSTRAR DATOS PERSONALES*/
        if($editar==1 and $codigo!="" and $nombre==""){
            $consulta = paraTodos::arrayConsulta("*", "clientes", "cli_codigo=$codigo");
            $razon = $consulta[0][cli_razon];
            $rif = $consulta[0][cli_rif];
            $cedula = $consulta[0][cli_cedula];
            $fecnac = $consulta[0][cli_fecnac];
            $nombre = $consulta[0][cli_nombres];
            $apellidos = $consulta[0][cli_apellidos];
            $telefono = $consulta[0][cli_telefono];
            $direccion = $consulta[0][cli_direccion];
            $correo = $consulta[0][cli_correo];
        }
        /*MOSTRAR DATOS BANCARIOS*/
        if($editar==1 and $codigo!="" and $cuenta==""){
            $datosban = paraTodos::arrayConsulta("*", "cliente_banco", "clientb_clicodigo=$codigo");
            $selbanco = $datosban[0][clientb_bancodigo];
            $cuenta = $datosban[0][clientb_cuenta];
        }
        /*MOSTRAR DATOS NOMINALES*/
        if($editar==1 and $codigo!="" and $nomina==""){
            $datosnom = paraTodos::arrayConsulta("*", "cliente_nomina", "clienn_clicodigo=$codigo");
            $institucion= $datosnom[0][clienn_instcodigo];
            $ubica= $datosnom[0][clienn_ubiccodigo];
            $nomina= $datosnom[0][clienn_nomcodigo];
            $condicion= $datosnom[0][clienn_condcodigo];
            $ingreso= $datosnom[0][clienn_fecingreso];
            
        }
        /*MOSTRAR DATOS DE ACCESO*/
        if($editar==1 and $codigo!="" and $usuariouser==""){
            $datosacc = paraTodos::arrayConsulta("*", "usuarios", "Cedula=$cedula");
            $usuariouser= $datosacc[0][Usuario];
            $niveluser= $datosacc[0][Nivel];
        }
    $consulta = paraTodos::arrayConsulta("*", "clientes", "1=1");
?>