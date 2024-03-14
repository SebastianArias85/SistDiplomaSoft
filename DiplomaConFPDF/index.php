<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',50);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(100,50,'Diploma',0,0,'C');
        // Salto de línea
        $this->Ln(50);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciación de la clase y creación del documento
$pdf = new PDF();
$pdf->AliasNbPages();

// Agregar una página con orientación horizontal (paisaje)
$pdf->AddPage('L', 'A4');

$pdf->Image('img/img.jpg', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());

// Campo de nombre
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,8,'Se entrega el siguiente reconocimiento por su gran labor a:',0,1,'C');
$pdf->Ln(15); // Reducido el espacio entre el texto anterior y el nombre

// Campo para el nombre ingresado por el usuario
$nombre = "Juan Sebastian Giancaspro Arias"; // Aquí deberías obtener el nombre ingresado desde algún formulario
$pdf->SetFont('Arial','B',30);
$pdf->Cell(0,1,$nombre,0,1,'C');
$pdf->Ln(15); // Reducido el espacio entre el nombre y el siguiente texto

// Texto "ha finalizado el curso"
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,8,'por haber finalizado el curso de',0,1,'C');
$pdf->Ln(15);

// Campo para el nombre ingresado del curso
$curso = "PHP Basico"; // Aquí deberías obtener el nombre ingresado desde algún formulario
$pdf->SetFont('Arial','B',30);
$pdf->Cell(0,1,$curso,0,1,'C');
$pdf->Ln(30);

// Campo para el nombre ingresado del curso
$firma = "Juan Perez"; // Aquí deberías obtener el nombre ingresado desde algún formulario
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,$firma,0,1,'C');
$pdf->Ln(-3);

// Campo para el nombre ingresado del curso
$rango = "Director"; // Aquí deberías obtener el nombre ingresado desde algún formulario
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,$rango,0,1,'C');
$pdf->Ln(10);

// Salida del documento
$pdf->Output();
?>
