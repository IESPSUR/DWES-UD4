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
    $file = fopen("locations.csv", "r");
    while (($datos = fgetcsv($file)) != false) {
        echo $datos[0];
        echo $datos[1];
        echo "<br>";
    }
    fclose($file);

    $file = fopen("locations.csv", 'a');
    $arrayDatos= array('Kimia','23,Sevilla');
    fputcsv($file,$arrayDatos,',');
    fclose($file);


    ?>

    <table border="1px">
        <?php
        $file = fopen("locations.csv", "r");
        while (($datos = fgetcsv($file)) != false) {
            echo "<tr><td>" . $datos[0] . "</td><td>" . $datos[1] . "</td></tr>";
            echo "<br>";
        }
        fclose($file);

        ?>

    </table>
</body>

</html>