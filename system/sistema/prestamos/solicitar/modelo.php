<?php
    $selprest = $_POST[selprest];
    $seltipoamort = $_POST[seltipoamort];
    $codigo = $_POST[codigo];
    $txtmonto = $_POST[txtmonto];
    $opcion = $_POST[actd];
    $editar = $_POST[editar];
	$fecha = date('Y-m-j');
	$nuevafecha = strtotime ( '-6 month' , strtotime ( $fecha ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
    if($opcion!=""){
        if($opcion=="1"){
            $consullimite = paraTodos::arrayConsulta("prest_limite", "prestamos", "prest_codigo=$codigo");
            foreach($consullimite as $limite){
                $result = $limite[prest_limite];
            }
            echo number_format($result,2,",",".");
        }
        if($opcion=="2"){
            /*Se consulta no se solicite un monto superior al limite del credito*/
            $consullimite = paraTodos::arrayConsulta("prest_limite", "prestamos", "prest_codigo=$selprest");
            foreach($consullimite as $limite){
                $result = $limite[prest_limite];
            }
            if($txtmonto>$result){
                paratodos::alerta("El monto suministrado excede el limite del credito");
                $txtmonto = substr($txtmonto, 0, -1);
                echo "<script>$('#txtmonto').val($txtmonto);</script>";
            }
        }
    }
    /*Se verifica si el asociado posee los datos actualizados*/
	$actualizado = paraTodos::arrayConsultanum("*", "datosper_act", "datac_cedula=$_SESSION[ci]");
    if($actualizado>0){
        $consul = paraTodos::arrayConsulta("max(datac_fecha) as fecha", "datosper_act", "datac_cedula=$_SESSION[ci]");
        foreach($consul as $row){
            $ultact = $row[fecha];
        }
        if ($ultact<$nuevafecha){
            paraTodos::alerta("Debe actualizar sus datos antes de realizar su solicitud");
            exit;
        }
        if($editar==1){
            /*Se valida hallan seleccionado un tipo de amortizacion*/
            if($seltipoamort==""){
                paraTodos::alerta("Debe seleccionar un tipo de amortización");
                exit;
            }
            /*Se consulta no se solicite un monto superior al limite del credito*/
            $consullimite = paraTodos::arrayConsulta("prest_limite", "prestamos", "prest_codigo=$selprest");
            foreach($consullimite as $limite){
                $result = $limite[prest_limite];
            }
            if($txtmonto>$result){
                paratodos::alerta("El monto suministrado excede el limite del credito");
                exit;
            }
            /* consultamos el vicerrectorado al que pertenece el asociado*/
            $consulta = paraTodos::arrayConsulta("clienn_ubiccodigo, cli_codigo, cli_nombres, cli_apellidos", "cliente_nomina, clientes", "clienn_clicodigo=cli_codigo and cli_cedula=$_SESSION[ci]");
            foreach($consulta as $row){
                $vicec = $row[clienn_ubiccodigo];
                $asoc = $row[cli_codigo];
                $nombre_asoc = $row[cli_nombres]." ".$row[cli_apellidos];                
            }                    
            /*Se valida aun existan cupos en la cola*/
            $validacupo = paraTodos::arrayConsultanum("*", "prestamos_cola c,prestamos p", "c.col_viccodigo=$vicec and 
(select count(a.clienn_ubiccodigo) from solicitudes s, cliente_nomina a where s.sol_asoccodigo=a.clienn_clicodigo and a.clienn_ubiccodigo=$vicec and s.sol_status<>'8')<c.col_cantidad 
and c.col_prestcodigo=p.prest_codigo");
            if($validacupo > 0){
                /*Consultamos los datos del tipo de prestamo*/
                $consultap = paraTodos::arrayConsulta("*", "prestamos", "prest_codigo=$selprest");
                foreach($consultap as $row){
                    $total = $txtmonto;
                    $monto_cuota =$total/$row[prest_cuotas];
                }
                $insertar = paraTodos::arrayInserte("sol_fecha, sol_asoccodigo, sol_prestcodigo, sol_monto,sol_amortcodigo,sol_status", "solicitudes", "current_date,$asoc, $selprest,$total,$seltipoamort,7");
                if($insertar){
                    paraTodos::alerta("Su solicitud se ha registrado con exito y se encuentra en proceso de verificación");
                }
            } else {
                paraTodos::alerta("Lo sentimos los cupos para este tipo de prestamos se han agotado.");
            }   
        }
    } else {
            paraTodos::alerta("Debe actualizar sus datos antes de realizar su solicitud");            
            exit;
    }
    $consuldescripcion = paraTodos::arrayConsulta("s.sol_fecha, p.prest_descripcion, ac.amort_descripcion, s.sol_monto, cs.st_descripcion", "solicitudes s, clientes c, prestamos p, config_amort ac, config_status cs", "sol_asoccodigo=c.cli_codigo and cli_cedula=$_SESSION[ci] and s.sol_prestcodigo=prest_codigo and ac.amort_codigo=s.sol_amortcodigo and cs.st_codigo=s.sol_status");