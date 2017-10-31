<?php
    require_once('../includes/fpdf/fpdf.php');
    class PDF extends FPDF {
        function Header() {
            /*** Funcion Donde es Escribe los Datos que se Imprimen en la zona superior del Documento ***/
         }
         function Footer() {
          /*** Funcion Donde es Escribe los Datos que se Imprimen en la zona Inferior del Documento ***/
          }
     }
	$vicerrectorado = paraTodos::arrayConsulta("cu.ubic_codigo, cu.ubic_descripcion", "solicitudes s, clientes c, cliente_nomina cn, config_ubicacion cu", "s.sol_asoccodigo=c.cli_codigo and c.cli_codigo=cn.clienn_clicodigo and cn.clienn_ubiccodigo=cu.ubic_codigo
group by cu.ubic_codigo, cu.ubic_descripcion");
    $pdf=new PDF();
	$pdf->addpage();
	$pdf->SetFont('Arial','B',10);
	$pdf->Image('../assets/img/logo.jpg',10,10,30);
	$pdf->Cell(0,5,utf8_decode('Fundación Fondo de Jubilaciones y Pensiones del Personal Académico'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('de la Universidad Nacional Experimental de los Llanos Occidentales'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('"Ezequiel Zamora"'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('"UNELLEZ"'),0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'SOLICITUDES REALIZADAS',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);
	$cuenta=0;
	foreach ($vicerrectorado as $rowv){
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(190,5,$rowv['ubic_descripcion'],1,1,'C');
        $consultotal = paraTodos::arrayConsulta("sum(s.sol_monto) as monto", "solicitudes s, clientes c, cliente_nomina cn, config_ubicacion cu", "s.sol_asoccodigo=c.cli_codigo and c.cli_codigo=cn.clienn_clicodigo and cn.clienn_ubiccodigo=cu.ubic_codigo and cu.ubic_codigo=$rowv[ubic_codigo]");
        foreach ($consultotal as $tot){
            $total = $tot[monto];
        }
		$solicitudes = paraTodos::arrayConsulta("c.cli_cedula, c.cli_nombres, c.cli_apellidos, s.sol_monto, p.prest_descripcion, cu.ubic_descripcion, s.sol_fecha, cs.st_descripcion", "solicitudes s, clientes c, cliente_nomina cn, config_ubicacion cu, prestamos p, config_status cs", "s.sol_asoccodigo=c.cli_codigo and c.cli_codigo=cn.clienn_clicodigo and cn.clienn_ubiccodigo=cu.ubic_codigo and cu.ubic_codigo=$rowv[ubic_codigo] and s.sol_prestcodigo=p.prest_codigo and s.sol_status=cs.st_codigo");
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
		$pdf->Cell(20,4,'Fecha',1,0,'C');
		$pdf->Cell(20,4,utf8_decode('Cédula'),1,0,'C');
		$pdf->Cell(45,4,'Nombre',1,0,'C');
		$pdf->Cell(45,4,'Apellido',1,0,'C');
		$pdf->Cell(25,4,'Monto',1,0,'C');
		$pdf->Cell(25,4,'Estatus',1,0,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Ln();
		$cuenta= 0;
		foreach($solicitudes as $rowf){
			$cuenta= $cuenta+1;
			$pdf->Cell(10,5,$cuenta,1,0,'C');
			$pdf->Cell(20,5,paraTodos::convertDate($rowf['sol_fecha']),1,0,'L');
			$pdf->Cell(20,5,number_format($rowf['cli_cedula'],0,',','.'),1,0,'L');
			$pdf->Cell(45,5,utf8_decode($rowf['cli_nombres']),1,0,'L');
			$pdf->Cell(45,5,utf8_decode($rowf['cli_apellidos']),1,0,'L');
			$pdf->Cell(25,5,number_format($rowf['sol_monto'],2,',','.')." Bs.",1,0,'L');
			$pdf->Cell(25,5,$rowf['st_descripcion'],1,0,'L');
			$pdf->Ln();
		}
        $pdf->Cell(140,5,'Total.:',0,0,'R');
        $pdf->Cell(25,5,number_format($total,2,',','.')." Bs.",1,0,'L');
        $pdf->Ln();
	}
    $pdf->Output();
?>
