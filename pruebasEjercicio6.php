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
    include_once "ejercicio7.php";
    creaVuelo("MiLugar","MiLugar2", "2021-10-23 14:02:54","sds","dfdsf");
    modificaDestino(3,"LELE");
    modificaCompanya(8,"NPMMMM");
    eliminaVuelo(4);
    extraeVuelos();
    ?>
</body>
</html>