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
        $mysqli = new mysqli('localhost', 'developer', 'developer', 'agenciaviajes');
        $error = $mysqli->connect_error;
        if ($error != "") {
            echo "error" . $error . " " . mysqli_connect_error();
        }
        return $mysqli;
    }

    function creaVuelo($origen, $destino, $fecha, $companya, $modeloAvion)
    {
        $mysqli = creaConexion();
        $sql = "INSERT into vuelos values(null,'Madrid','Barc','2021-10-23 14:02:54','sx','sxsx')";
        $result = $mysqli->query($sql);
        $mysqli->close();
        return $result;
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
        $retorno = false;
        $mysqli = creaConexion();
        $sql = "SELECT * from vuelos;";
        $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $retorno = $stmt->execute();
            if ($retorno == true) {
                $stmt->bind_result($id, $origen, $destino, $fecha, $companya, $modeloAvion);
                while ($stmt->fetch()) {
                    echo "Origen: " . $origen . " Destino: " . $destino . " Fcecha: " . $fecha . " Compania: " . $companya . " Modelo: " . $modeloAvion . "<br>";
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($mysqli);
        return $retorno;
    }




    ?>
</body>

</html>