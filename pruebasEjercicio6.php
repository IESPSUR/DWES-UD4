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
    include_once "ejercicio6.php";
    creaVuelo("Sevilla","MiLugar2", "2021-10-23 14:02:54","sds","dfdsf");
    modificaDestino(3,"PEPE");
    modificaCompanya(8,"NPM");
    eliminaVuelo(1);
    $array=extraeVuelos();
    foreach ($array as $valor) {
        echo "Origen: " . $valor[0] . " Destino: " . $valor[1] . " Fcecha: " . $valor[2] . " Compania: " . $valor[3] . " Modelo: " . $valor[4] . "<br>";
    }
    ?>
</body>
</html>