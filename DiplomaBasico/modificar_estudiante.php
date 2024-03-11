<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Estudiante</title>
</head>
<body>
    <h2>Modificar Estudiante</h2>

    <?php
    // Verificar si se proporcionó un ID de estudiante
    if(isset($_GET['id'])) {
        $estudiante_id = $_GET['id'];

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

        // Obtener datos del estudiante seleccionado
        $sql = "SELECT * FROM estudiantes WHERE id = $estudiante_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="actualizar_estudiante.php" method="post">
                <input type="hidden" name="estudiante_id" value="<?php echo $row['id']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>"><br>
                <label for="curso">Curso:</label>
                <input type="text" id="curso" name="curso" value="<?php echo $row['curso']; ?>"><br>
                <label for="fecha_concurrencia">Fecha de Concurrencia:</label>
                <input type="date" id="fecha_concurrencia" name="fecha_concurrencia" value="<?php echo $row['fecha_concurrencia']; ?>"><br>
                <button type="submit" name="accion" value="modificar">Modificar</button>
                <a href="tabla.php"><button type="button">Cancelar</button></a>
            </form>
            <?php
        } else {
            echo "No se encontró el estudiante.";
        }
        $conn->close();
    } else {
        echo "No se proporcionó un ID de estudiante.";
    }
    ?>
</body>
</html>
