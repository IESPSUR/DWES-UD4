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
    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error == "") {
        echo "Conectado<br>";
    } else {
        echo "error" . $error . " " . mysqli_connect_error();
    }


    $result = mysqli_query($mysqli, "DELETE from `vuelos` where id=5;");
    if ($result == true && mysqli_affected_rows($mysqli) > 0) {
        echo "La fila se ha borrado correctamente";
    } else {
        echo "La fila no se ha borrado correctamente";
    }
    echo "<br>";

    $result = mysqli_query($mysqli, "INSERT INTO `vuelos`( Origen, `Destino`, `Fecha`, `Companya`, `ModeloAvion`) VALUES ('Sanlucar','Chipiona','2021-10-23 14:02:54','g','oo')");
    if ($result == true  && mysqli_affected_rows($mysqli) > 0) {
        echo "Se ha insertado la fila correctamente";
    } else {
        echo "No se ha insertado la fila correctamente";
    }
    echo "<br>";

    $result = mysqli_query($mysqli, "UPDATE vuelos set Origen='Holaa' where id=5");
    if ($result == true && mysqli_affected_rows($mysqli) > 0) {
        echo "Se ha actualizado correctamente";
    } else {
        echo "No se ha actualizado correctamente";
    }
    mysqli_close($mysqli);

    ?>

</body>

</html>