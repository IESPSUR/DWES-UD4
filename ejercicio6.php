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
        @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
        $error = mysqli_connect_errno();
        if ($error != "") {
            echo "error" . $error . " " . mysqli_connect_error();
        }
        return $mysqli;
    }

    function creaVuelo($origen, $destino, $fecha, $companya, $modeloAvion)
    {
        $retorno = true;
        $mysqli = creaConexion();
        $sql = "INSERT into vuelos values(null,?,?,?,?,?)";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, 'sssss', $origen, $destino, $fecha, $companya, $modeloAvion);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }
    function modificaDestino($id, $destino)
    {
        $retorno = true;
        $mysqli = creaConexion();
        $sql = "UPDATE vuelos set Destino=? where id=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, 'si', $destino, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }

    function modificaCompanya($id, $companya)
    {
        $retorno = true;
        $mysqli = creaConexion();
        $sql = "UPDATE vuelos set Companya=? where id=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, 'si', $companya, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }

    function eliminaVuelo($id)
    {
        $retorno = true;
        $mysqli = creaConexion();
        $sql = "DELETE from vuelos where id=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, 'i', $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }

    function extraeVuelos()
    {
        $retorno = true;
        $mysqli = creaConexion();
        $sql = "SELECT * from vuelos;";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            $retorno = mysqli_stmt_execute($stmt);
            if ($retorno) {
                mysqli_stmt_bind_result($stmt, $id, $origen, $destino, $fecha, $companya, $modeloAvion);
                while (mysqli_stmt_fetch($stmt)) {
                    echo "Origen: " . $origen . " Destino: " . $destino . " Fcecha: " . $fecha . " Compania: " . $companya . " Modelo: " . $modeloAvion . "<br>";
                }
            }
            mysqli_stmt_close($stmt);
            return $retorno;
        }
        mysqli_close($mysqli);
    }





    ?>
</body>

</html>