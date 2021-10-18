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
    do {
        echo fgetcsv( $file,  0,  ";", "'");
        echo "<br>";
    } while (fgetcsv($file) != false);
    fclose($file);

    $file = fopen("locations.csv", "a+");
    $arrayDatos= array('Kimia','23,Sevilla');
    fputcsv();

    
    ?>
</body>
</html>