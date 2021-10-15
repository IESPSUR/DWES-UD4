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
    //Recuperando la informacion del fichero
    $file = fopen("ejercicio1fichero.txt", "r");
    do {
        echo fgets($file);
        echo "<br>";
    } while (feof($file) == false);
    fclose($file);

    //Escribir en el fichero
    $file = fopen("ejercicio1fichero.txt", "a");
    //PHP_EOL -> salto de linea
    fwrite($file, "\nKimia,160,60,black,white,brown,1998,female,NS,Human");
    fclose($file);
    ?>


    <table border="1px">

        <?php
        //Escribir en la tabla
        $file = fopen("ejercicio1fichero.txt", "r");
        do {
            $datos = preg_split('/,/', fgets($file));
            echo "<tr><td>" . $datos[0] . "</td> <td>" . $datos[1] . "</td> <td>" . $datos[2] . "</td> <td>" . $datos[3] . "</td> <td>" . $datos[4] . "</td> <td>" . $datos[5] . "</td> <td>" . $datos[6] . "</td> <td>" . $datos[7] . "</td> <td>" . $datos[8] . "</td> <td>" . $datos[9] . "</td> </tr>";
            echo "<br>";
        } while (feof($file) == false);
        fclose($file);
        ?>

    </table>
</body>

</html>