<?php
//Incluimos a libreria para generar el PDF
require('../fpdf/fpdf.php');

function AddText($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b) {
$pdf->SetFont($f,$t,$s);	
$pdf->SetXY($x,$y);
$pdf->SetTextColor($r,$g,$b);
$pdf->Cell(0,10,$text,0,0,$a);	
}

// Creamos la hoja A4 para el cetificado
$pdf = new FPDF('L','mm','A4');
function CreatePage($pdf,$name)
{
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetCreator('David Morgan');
// Agregamos la imagen de fondo a PDF
$pdf->Image('../img/fondo.jpg',0,0,0);	

//Agregamos nombre a los certificados dinamicos

AddText($pdf,ucwords($name), 0,80, 'C', 'Helvetica','B',30,3,84,156);
}
CreatePage($pdf,'Miguel Saavedra Gomez');

CreatePage($pdf,'Luisa Basadre Bustios');

CreatePage($pdf,'Manuel Garcia Fizza');

CreatePage($pdf,'Carlos Bazan Moreno');

$pdf->Output();
?>