<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-generar, .btn-modificar {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2>Lista de Estudiantes</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Curso</th>
            <th>Fecha de Concurrencia</th>
            <th>Acciones</th>
        </tr>
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

        // Obtener datos de estudiantes
        $sql = "SELECT * FROM estudiantes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellido"] . "</td>";
                echo "<td>" . $row["curso"] . "</td>";
                echo "<td>" . $row["fecha_concurrencia"] . "</td>";
                echo "<td><a href='generar_diploma.php?id=" . $row["id"] . "' class='btn-generar'>Generar</a> ";
                echo "<a href='modificar_estudiante.php?id=" . $row["id"] . "' class='btn-modificar'>Modificar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se encontraron estudiantes.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
