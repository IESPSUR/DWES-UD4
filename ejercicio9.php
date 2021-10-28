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
        $sql = "INSERT into turista values(null,'Kimia','Ehsani','Dolati','RM','12134')";
        $numeroFilas = $con->exec($sql);
        echo "Se ha insertado " . $numeroFilas . " fila <br>";

        $sql = "DELETE from turista where id=" . $con->lastInsertId() . ";";
        $numeroFilas = $con->exec($sql);
        echo "Se han borrado " . $numeroFilas . " filas <br>";

        $sql = "UPDATE turista set nombre= 'Elena' where id=1;";
        $numeroFilas = $con->exec($sql);
        echo "Se han actualizado " . $numeroFilas . " filas <br>";

        $con = null;
    } catch (PDOException $e) {
        echo $e;
    }
    ?>
</body>

</html>