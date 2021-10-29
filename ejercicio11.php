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
        $servidor = "localhost";
        $baseDatos = "agenciaviajes";
        $usuario = "developer";
        $pass = "developer";
        try {
            $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        } catch (PDOException $e) {
            echo $e;
        }
        return $con;
    }
    function creaTurista($nombre, $ape1, $ape2, $dir, $tel)
    {
        $con = creaConexion();
        $sql = $con->prepare("INSERT into turista values(null,:nombre,:apellido1,:apellido2,:direccion,:telefono)");
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":apellido1", $ape1);
        $sql->bindParam(":apellido2", $ape2);
        $sql->bindParam(":telefono", $tel);
        $sql->bindParam(":direccion", $dir);
        $sql->execute();
        $id = $con->lastInsertId();
        $con = null;
        return $id;
    }
    function extraeTurista($id)
    {
        $con = creaConexion();
        $sql = $con->prepare("SELECT * from turista where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        $row = $sql->fetch();
        $con = null;
        return $row;
    }
    function extraeTuristas()
    {
        $con = creaConexion();
        $sql = $con->prepare("SELECT * from turista;");
        $sql->execute();
        $miArray = [];
        $cont = 0;
        while ($row = $sql->fetch()) {
            $miArray[$cont] = array($row["id"], $row["nombre"], $row["apellido1"], $row["apellido2"], $row["direccion"], $row["telefono"]);
            $cont++;
        }
        $con = null;
        return $miArray;
    }
    function actualizaTurista($dir, $tel, $id)
    {
        $retorno = false;
        $con = creaConexion();
        $sql = $con->prepare("UPDATE turista set direccion=:direccion , telefono=:telefono where id=:id;");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":direccion", $dir);
        $sql->bindParam(":telefono", $tel);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
        $con = null;
        return $retorno;
    }
    function eliminaTurista($id)
    {
        $retorno = false;
        $con = creaConexion();
        $sql = $con->prepare("DELETE from turista where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
        $con = null;
        return $retorno;
    }

    echo creaTurista("Kimia", "Ehsani", "Dolati", "ReinaMereceds", 12);
    print_r(extraeTuristas());
    var_export(actualizaTurista('b', '11', 3));
    var_export(eliminaTurista(6));
    ?>
</body>

</html>