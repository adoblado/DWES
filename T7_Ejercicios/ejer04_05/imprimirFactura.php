<?php

//$factura = $_REQUEST['factura'];
ob_start();
require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();

//cabecera de la factura 
/*$pdf->Cell(0,20,"FACTURA PARA CLIENTE", 0, 1, C, true);

//cabecera de la tabla
$pdf->Cell(10,10,"Codigo", 1, 1, C);
$pdf->Cell(40,10,"Descripcion", 0, 1, C);
$pdf->Cell(20,10,"Precio por unidad", 0, 1, C);
$pdf->Cell(15,10,"Cantidad", 0, 1, C);
$pdf->Cell(20,10,"Base Imponible", 0, 1, C);
$pdf->Cell(5,10,"IVA", 0, 1, C);
$pdf->Cell(10,10,"Precio Total", 0, 1, C);*/

$pdf->Cell(40,10,"hola");
$pdf->Ln();

$pdf->Output();
ob_end_flush();

