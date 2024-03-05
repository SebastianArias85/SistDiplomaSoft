<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diploma de Concurso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .diploma {
            width: 800px;
            height: 500px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-sizing: border-box;
        }
        .titulo {
            text-align: center;
            font-size: 45px;
            margin-top: 20px;
            margin-bottom: 34px;
        }
        .nombre {
            text-align: center;
            font-size: 20px;
            margin-top: 78px;
            margin-bottom: 40px;
        }
        .curso {
            text-align: center;
            font-size: 38px;
            margin-top: 74px;
            margin-bottom: -69px;
        }
        .fecha {
            text-align: right;
            font-size: 16px;
            margin-top: 184px;
        }
    </style>
</head>
<body>
    <div class="diploma">
        <div class="titulo">Diploma de Concurso</div>
        <?php
        // Obtener el ID del estudiante desde el parámetro GET
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
                while($row = $result->fetch_assoc()) {
                    echo "<div class='nombre'>Se deja constancia que el Sr./Sra " . $row["nombre"] . " " . $row["apellido"] ." aprobó la capacitacion de: </div>";
                    echo "<div class='curso'>Curso: " . $row["curso"] . "</div>";
                    echo "<div class='fecha'>Fecha de Concurrencia: " . $row["fecha_concurrencia"] . "</div>";
                }
            } else {
                echo "No se encontraron datos del estudiante.";
            }
            $conn->close();
        } else {
            echo "No se ha proporcionado un ID de estudiante.";
        }
        ?>
    </div>
</body>
</html>
