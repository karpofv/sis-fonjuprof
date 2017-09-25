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
        if($opcion==1){
            $consullimite = paraTodos::arrayConsulta("prest_limite", "prestamos", "prest_codigo=$codigo");
            foreach($consullimite as $limite){
                $result = $limite[prest_limite];
            }         
            echo number_format($result,2,",",".");
        }
    }
    /*Se verifica si el asociado posee los datos actualizados*/
	$actualizado = paraTodos::arrayConsultanum("*", "datosper_act", "datac_cedula=$_SESSION[ci]");
    if($actualizacion>0){
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
            /* consultamos el vicerrectorado al que pertenece el asociado*/
            $consulta = paraTodos::arrayConsulta("asoc_viccodigo", "asociado", "asoc_cedula=$_SESSION[ci]");
            foreach($consulta as $row){
                $vicec = $row[asoc_viccodigo];
                $asoc = $row[asoc_codigo];
                $nombre_asoc = $row[asoc_nombres]." ".$row[asoc_apellidos];                
            }                    
            /*Se valida aun existan cupos en la cola*/
            $validacupo = paraTodos::arrayConsultanum("*", "prestamos_cola c,prestamos p", "c.col_viccodigo=$vicec and (select count(a.asoc_viccodigo) from solicitudes s, asociado a where s.sol_asoccodigo=a.asoc_codigo and a.asoc_viccodigo=$vicec and a.sol_status<>'3' and a.asoc_viccodigo<>'2')<c.col_cantidad and c.col_prestcodigo=p.prest_codigo");
            if($validacupo > 0){
                /*Consultamos los datos del tipo de prestamo*/
                $consultap = paraTodos::arrayConsulta("*", "prestamos", "prest_codigo=$selprest");
                foreach($consultap as $row){
                    $total = $txtmonto;
                    $monto_cuota =$total/$row[prest_cuotas];
                }
                $insertar = paraTodos::arrayInserte("sol_fecha, sol_asoccodigo, sol_prestcodigo, sol_monto,sol_amortcodigo,sol_status", "solicitudes", "current_date,$asoc, $selprest,$total,$seltipoamort,1");
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