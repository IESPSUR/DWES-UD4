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

    $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
    ?>


    <table border="1px">
        <tr>
            <th>id</th>
            <th>origen</th>
            <th>destino</th>
            <th>fecha</th>
            <th>Companya</th>
            <th>ModeloAvion</th>
        </tr>
        <?php
        if ($result != false) {
            while ($fila = mysqli_fetch_assoc($result)) {
                echo "<tr> <td>" . $fila["id"] . "</td> <td>" . $fila["Origen"] . "</td><td>" . $fila["Destino"] . "</td><td>" . $fila["Fecha"] . "</td><td>" . $fila["Companya"] . "</td><td>" . $fila["ModeloAvion"] . "</td> </tr>";
            }
        }
        ?>
    </table>

    <table border="1px">
        <tr>
            <th>id</th>
            <th>origen</th>
            <th>destino</th>
            <th>fecha</th>
            <th>Companya</th>
            <th>ModeloAvion</th>
        </tr>
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
        if ($result != false) {
            while ($fila = mysqli_fetch_object($result)) {
                echo "<tr> <td>" . $fila->id . "</td> <td>" .  $fila->Origen . "</td><td>" .  $fila->Destino . "</td><td>" .  $fila->Fecha . "</td><td>" .  $fila->Companya . "</td><td>" .  $fila->ModeloAvion . "</td> </tr>";
            }
        } else {
            echo "false";
        }
        ?>
    </table>


    <table border="1px">
        <tr>
            <th>id</th>
            <th>origen</th>
            <th>destino</th>
            <th>fecha</th>
            <th>Companya</th>
            <th>ModeloAvion</th>
        </tr>
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
        if ($result != false) {
            while ($fila = mysqli_fetch_array($result)) {
                echo "<tr> <td>" . $fila["id"] . "</td> <td>" . $fila["Origen"] . "</td><td>" . $fila["Destino"] . "</td><td>" . $fila["Fecha"] . "</td><td>" . $fila["Companya"] . "</td><td>" . $fila["ModeloAvion"] . "</td> </tr>";
            }
        } else {
            echo "false";
        }
        ?>
    </table>

    <table border="1px">
        <tr>
            <th>id</th>
            <th>origen</th>
            <th>destino</th>
            <th>fecha</th>
            <th>Companya</th>
            <th>ModeloAvion</th>
        </tr>
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
        if ($result != false) {
            while ($fila = mysqli_fetch_row($result)) {
                echo "<tr> <td>" . $fila[0] . "</td> <td>" . $fila[1] . "</td><td>" . $fila[2] . "</td><td>" . $fila[3] . "</td><td>" . $fila[4] . "</td><td>" . $fila[5] . "</td> </tr>";
            }
        } else {
            echo "false";
        }

        mysqli_close($mysqli);
        ?>
    </table>

</body>

</html>