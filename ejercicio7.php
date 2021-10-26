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

    function creaConexion()
    {
        $mysqli = new mysqli('localhost', 'root', 'root', 'agenciaviajes');
        $error = $mysqli->connect_error;
        if ($error != "") {
            echo "error" . $error . " " . mysqli_connect_error();
        }
        return $mysqli;
    }

    function creaVuelo($origen, $destino, $fecha, $companya, $modeloAvion)
    {
        $retorno = false;
        $mysqli = creaConexion();
        $sql = "INSERT into vuelos values(null,?,?,?,?,?);";
        $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('sssss', $origen, $destino, $fecha, $companya, $modeloAvion);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }

    function modificaDestino($id, $destino)
    {
        $retorno = false;
        $mysqli = creaConexion();
        $sql = "UPDATE vuelos set Destino=? where id=?";
        $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('si', $destino, $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }

    function modificaCompanya($id, $companya)
    {
        $retorno = false;
        $mysqli = creaConexion();
        $sql = "UPDATE vuelos set Companya=? where id=?";
        $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('si', $companya, $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }

    function eliminaVuelo($id)
    {
        $retorno = false;
        $mysqli = creaConexion();
        $sql = "DELETE from vuelos where id=?";
        $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('i', $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }

    function extraeVuelos()
    {
        $datos = [];
        $mysqli = creaConexion();
        $sql = "SELECT * from vuelos;";
        $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($id, $origen, $destino, $fecha, $companya, $modeloAvion);
            $i = 0;
            while ($stmt->fetch()) {
                $datos[$i] = array($origen, $destino, $fecha, $companya, $modeloAvion);
                $i++;
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($mysqli);
        return $datos;
    }




    ?>
</body>

</html>