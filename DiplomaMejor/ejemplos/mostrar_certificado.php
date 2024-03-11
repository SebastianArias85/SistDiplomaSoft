<?php
// Iniciar sesión
session_start();

// Verificar si existe el código PHP en la sesión
if (isset($_SESSION['codigo_php'])) {
    // Guardar el código PHP en un archivo temporal
    $archivo_temporal = tempnam(sys_get_temp_dir(), 'certificado_');
    file_put_contents($archivo_temporal, $_SESSION['codigo_php']);

    // Incluir el archivo temporal que contiene el código PHP del certificado
    include $archivo_temporal;

    // Eliminar el archivo temporal
    unlink($archivo_temporal);

    // Limpiar la variable de sesión
    unset($_SESSION['codigo_php']);
} else {
    echo "No se ha generado ningún certificado.";
}
?>

