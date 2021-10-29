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
        $con->beginTransaction();
        $fallo = true;
        $sql = "INSERT into turista values(null,'Kimia','Ehsani','Dolati','RM','12134')";
        $con->exec($sql);
        if ($con->lastInsertId() <= 0) {
            $fallo = false;
        }
        $sql = "INSERT into turista values(null,'Jack','Ehsani','Dolati','RM','12134')";
        $con->exec($sql);
        if ($con->lastInsertId() <= 0) {
            $fallo = false;
        }
        $sql = "INSERT into turista values(null,'María','Ehsani','Dolati','RM','12134')";
        $con->exec($sql);
        if ($con->lastInsertId() <= 0) {
            $fallo = false;
        }

        if ($fallo == false) {
            $con->rollBack();
        } else {
            $con->commit();
        }
    } catch (PDOException $e) {
        echo $e;
    }

    ?>
</body>

</html>