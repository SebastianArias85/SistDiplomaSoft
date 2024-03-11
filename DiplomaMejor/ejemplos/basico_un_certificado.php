<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un nombre
    if (!empty($_POST['nombre'])) {
        // Obtener el nombre del formulario y convertir la primera letra de cada palabra a mayúscula
        $nombre = ucwords($_POST['nombre']);
        
        // Generar el código PHP para el certificado con el nombre proporcionado
        $codigo_php = "<?php\n";
        $codigo_php .= "require('../fpdf/fpdf.php');\n\n";
        $codigo_php .= "function AddText(\$pdf, \$text, \$x, \$y, \$a, \$f, \$t, \$s, \$r, \$g, \$b) {\n";
        $codigo_php .= "\$pdf->SetFont(\$f,\$t,\$s);\n";
        $codigo_php .= "\$pdf->SetXY(\$x,\$y);\n";
        $codigo_php .= "\$pdf->SetTextColor(\$r,\$g,\$b);\n";
        $codigo_php .= "\$pdf->Cell(0,10,\$text,0,0,\$a);\n";
        $codigo_php .= "}\n\n";
        $codigo_php .= "\$pdf = new FPDF('L','mm','A4');\n";
        $codigo_php .= "\$pdf->AddPage();\n";
        $codigo_php .= "\$pdf->SetFont('Arial','B',16);\n";
        $codigo_php .= "\$pdf->SetCreator('Milor');\n";
        $codigo_php .= "\$pdf->Image('../img/fondo.png',0,0,0);\n";
        $codigo_php .= "AddText(\$pdf, '$nombre', 0,80, 'C', 'Helvetica','B',30,3,84,156);\n";
        $codigo_php .= "\$pdf->Output();\n";
        $codigo_php .= "?>";

        // Crear una sesión para almacenar el código PHP
        session_start();
        $_SESSION['codigo_php'] = $codigo_php;

        // Redirigir al script que mostrará el certificado generado
        header('Location: mostrar_certificado.php');
        exit();
    } else {
        echo "Por favor, ingresa un nombre.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Certificado</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre: <input type="text" name="nombre">
        <input type="submit" value="Generar Certificado">
    </form>
</body>
</html>
