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
    $pdf->Cell(0,10,'SOLICITUD DE PRESTAMO',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);
	$cuenta=0;
	$solicitudes = paraTodos::arrayConsulta("sol_fecha,c.cli_cedula, c.cli_fecnac, c.cli_apellidos, c.cli_nombres, c.cli_telefono, c.cli_correo, c.cli_direccion, cu.ubic_descripcion, s.sol_monto, p.prest_descripcion", "solicitudes s, clientes c, cliente_nomina cn, config_ubicacion cu, prestamos p", "s.sol_asoccodigo=c.cli_codigo and cn.clienn_clicodigo=c.cli_codigo and cn.clienn_ubiccodigo=cu.ubic_codigo and p.prest_codigo=s.sol_prestcodigo and s.sol_codigo=$_REQUEST[cod]");
	foreach($solicitudes as $rowf){
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(155,5,'Fecha: ',0,0,'R');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(25,5,paraTodos::convertDate($rowf['sol_fecha']),0,1,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(25,5,utf8_decode('Cédula: '),0,0,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(79,5,$rowf['cli_cedula'],0,0,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(30,5,'Fecha de nacimiento: ',0,0,'R');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(25,5,paraTodos::convertDate($rowf['cli_fecnac']),0,1,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(25,5,'Apellidos: ',0,0,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(70,5,utf8_decode($rowf['cli_apellidos']),0,0,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(25,5,'Nombres: ',0,0,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(70,5,utf8_decode($rowf['cli_nombres']),0,1,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(40,5,utf8_decode('Teléfonos: '),0,0,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(150,5,utf8_decode($rowf['cli_telefono']),0,1,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(40,5,utf8_decode('Correo Electrónico: '),0,0,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(150,5,utf8_decode($rowf['cli_correo']),0,1,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(40,5,utf8_decode('Dirección: '),0,0,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(150,5,utf8_decode($rowf['cli_direccion']),0,1,'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(40,5,utf8_decode('Vicerrectorado: '),0,0,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(150,5,utf8_decode($rowf['ubic_descripcion']),0,1,'L');
		$pdf->Ln();
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0,10,'DATOS DEL PRESTAMO',0,0,'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(20,4,'Fecha',1,0,'C');
		$pdf->Cell(130,4,'Tipo de prestamo',1,0,'C');
		$pdf->Cell(40,4,'Monto',1,0,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Ln();
		$pdf->Cell(20,5,paraTodos::convertDate($rowf['sol_fecha']),1,0,'L');
		$pdf->Cell(130,5,$rowf['prest_descripcion'],1,0,'L');
		$pdf->Cell(40,5,number_format($rowf['sol_monto'],2,',','.')." Bs.",1,0,'C');
		$pdf->Ln();
	}
    $pdf->Output();
?>
