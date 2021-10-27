<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";

    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo "Conectado<br>";
        $sql = "SELECT * from turista;";
        
        $turistas = $con->query($sql);
        echo "<table border=1px> <tr><th>nombre</th><th>apellido1</th><th>direccion</th></tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>".$turista["nombre"]."</td><td>" . $turista["apellido1"] . "</td><td>" . $turista["direccion"] . "</td></tr>";
        }
        echo "</table>";

        $turistas = $con->query($sql);
        echo "<table border=1px> <tr><th>nombre</th><th>apellido1</th><th>direccion</th></tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_NUM)) {
            echo "<tr><td>".$turista[1]."</td><td>" . $turista[2] . "</td><td>" . $turista[4] . "</td></tr>";
        }
        echo "</table>";

        $turistas = $con->query($sql);
        echo "<table border=1px> <tr><th>nombre</th><th>apellido1</th><th>direccion</th></tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_BOTH)) {
            echo "<tr><td>".$turista["nombre"]."</td><td>" . $turista["apellido1"] . "</td><td>" . $turista["direccion"] . "</td></tr>";
        }
        echo "</table>";

        $turistas = $con->query($sql);
        echo "<table border=1px> <tr><th>nombre</th><th>apellido1</th><th>direccion</th></tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_OBJ)) {
            echo "<tr><td>".$turista->nombre."</td><td>" . $turista->apellido1 . "</td><td>" . $turista->direccion . "</td></tr>";
        }
        echo "</table>";

        $turistas = $con->query($sql);
        echo "<table border=1px> <tr><th>nombre</th><th>apellido1</th><th>direccion</th></tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_LAZY)) {
            echo "<tr><td>".$turista["nombre"]."</td><td>" . $turista["apellido1"] . "</td><td>" . $turista["direccion"] . "</td></tr>";
        }
        echo "</table>";

        $turistas = $con->query($sql);
        $turistas->bindColumn('nombre', $nombre);
        $turistas->bindColumn('apellido1', $ape1);
        $turistas->bindColumn('direccion', $dir);

        echo "<table border=1px> <tr><th>nombre</th><th>apellido1</th><th>direccion</th></tr>";
        while ($turista = $turistas->fetch(PDO::FETCH_BOUND)) {
            echo "<tr><td>".$nombre."</td><td>" . $ape1 . "</td><td>" . $dir . "</td></tr>";
         }
         echo "</table>";

        $con = null;
    } catch (PDOException $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }

    ?>
</body>

</html>