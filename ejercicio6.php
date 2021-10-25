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

function creaConexion(){
    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error == "") {
        echo "Conectado<br>";
    } else {
        echo "error" . $error . " " . mysqli_connect_error();
    }
    return $mysqli;
}

function creaVuelo($origen,$destino,$fecha, $companya, $modeloAvion){
    $sql = "INSERT into vuelos values(null,?,?,?,?,?)";
    $consulta = mysqli_stmt_init($mysqli);
    if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $origen, $destino,$fecha,$companya,$modeloAvion);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
function modificaDestino($id,$destino){
    $sql = "UPDATE vuelos set;
    $consulta = mysqli_stmt_init($mysqli);
    if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $origen, $destino,$fecha,$companya,$modeloAvion);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}


    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error == "") {
        echo "Conectado<br>";
    } else {
        echo "error" . $error . " " . mysqli_connect_error();
    }

    $origen = "Dinamarca";
    $id = 4;
    $sql = "SELECT * from vuelos where Origen=? and  id=?";
    $consulta = mysqli_stmt_init($mysqli);
    if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $origen, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $origen, $destino, $fecha, $companya, $modeloAvion);
        while (mysqli_stmt_fetch($stmt)) {
            echo "Origen: " . $origen . " Destino: " . $destino . " Fcecha: " . $fecha . " Compania: " . $companya . " Modelo: " . $modeloAvion;
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($mysqli);






    ?>
</body>

</html>