<?php
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

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$curso = $_POST['curso'];
$fecha_concurrencia = $_POST['fecha_concurrencia'];

// Insertar datos en la base de datos
$sql = "INSERT INTO estudiantes (nombre, apellido, curso, fecha_concurrencia)
        VALUES ('$nombre', '$apellido', '$curso', '$fecha_concurrencia')";

if ($conn->query($sql) === TRUE) {
    echo "Estudiante registrado correctamente";
    header("Location: tabla.php");
} else {
    echo "Error al registrar al estudiante: " . $conn->error;
}

$conn->close();
?>
