<?php
// Verificar si se recibieron los datos del formulario
if(isset($_POST['estudiante_id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['curso']) && isset($_POST['fecha_concurrencia'])) {
    // Recibir los datos del formulario
    $estudiante_id = $_POST['estudiante_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $curso = $_POST['curso'];
    $fecha_concurrencia = $_POST['fecha_concurrencia'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cursos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Actualizar los datos del estudiante en la base de datos
    $sql = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', curso='$curso', fecha_concurrencia='$fecha_concurrencia' WHERE id='$estudiante_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Los datos del estudiante se actualizaron correctamente.";
        header("Location: tabla.php");
    } else {
        echo "Error al actualizar los datos del estudiante: " . $conn->error;
    }

    $conn->close();
} else {
    echo "No se recibieron los datos del formulario correctamente.";
}
?>
