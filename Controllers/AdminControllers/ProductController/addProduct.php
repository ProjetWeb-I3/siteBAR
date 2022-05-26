<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

try {
    if (isset($_POST['upload'])) {

        $target = "../imagesArticle/" . basename($_FILES['image']['name']);

        $image = $_FILES['image']['name'];
        $text = $_POST['content'];
        $name = $_POST['name'];


        $sql = "INSERT INTO products (name_products ,image_products, content_products)
	                        VALUES('$name','$image','$text')";

        $conn->exec($sql);
        header('Location: /siteBAR/Views/Admin/ProductManager/index.php');
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "image importée avec succès";
        } else {
            $msg = "problème";
        }
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

