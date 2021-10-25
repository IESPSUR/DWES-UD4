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
    creaVuelo("MiLugar","MiLugar2", "2021-10-23 14:02:54","sds","dfdsf");
    modificaDestino(4,"PEPE");
    modificaCompanya(3,"NPM");
    eliminaVuelo(4);
    extraeVuelos();
    ?>
</body>
</html>