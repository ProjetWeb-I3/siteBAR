<?php

require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';

if (isset($_POST['upload'])) {

    $target = "../imagesArticle/" . basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $text = $_POST['content'];
    $name = $_POST['name'];


    $sql = "INSERT INTO products (name_products ,image_products, content_products) VALUES('$name','$image','$text')";
    $req = $conn->query($sql);

    header('Location:' . $GLOBALS["URL"] . '/Views/Admin/ProductManager/index.php');

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "image importée avec succès";
    } else {
        $msg = "problème";
    }
}

