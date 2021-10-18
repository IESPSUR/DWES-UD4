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
    $info = simplexml_load_file("ejercicio3xml.xml");
    $libro = $info->book[1];

    printf("Author: %s <br> -Title: %s <br> -Genre: %s <br> -Price: %s <br> -PublishDate: %s <br> -Desc: %s <br>", $libro->author, $libro->title, $libro->genre, $libro->price, $libro->publish_date, $libro->description)

    ?>


    <table border="1px">
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Price</th>
        </tr>
        <?php
        foreach ($info->book as $lib) {
            echo "<tr><td>" . $lib->title . "</td> <td>" . $lib->genre . "</td> <td>" . $lib->price . "</td></tr>";
        }
        ?>
    </table>

    <?php
    $miLibro = $info->addChild("book");
    $miLibro->addAttribute("id", "bk113");
    $miLibro->addChild("author", "Kimia");
    $miLibro->addChild("title", "BloodCity");
    $miLibro->addChild("genre", "Horror");
    $miLibro->addChild("price", "32.20");
    $miLibro->addChild("publish_date", "2020-10-10");
    $miLibro->addChild("description", "It's a horror book, not recomendable for children");
    $info->asXML("ejercicio3xml.xml");
    ?>


    <table border="1px">
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Price</th>
        </tr>
        <?php
        foreach ($info->book as $lib) {
            echo "<tr><td>" . $lib->title . "</td> <td>" . $lib->genre . "</td> <td>" . $lib->price . "</td></tr>";
        }
        ?>
    </table>
</body>

</html>