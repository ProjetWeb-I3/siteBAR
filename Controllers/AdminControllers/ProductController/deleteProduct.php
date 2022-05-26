<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (isset($_SESSION['adminBAR']) and !empty($_SESSION['adminBAR'])) {

    if (isset($_GET['id'])) {

        $req = $conn->query('SELECT * FROM products WHERE id_products = ' . $_GET['id']);
        $articles = $req->fetch();

        if ($articles) {
            $req = $conn->query('DELETE FROM products WHERE id_products = ' . $_GET['id']);
        }
        header('Location: /siteBAR/Views/Admin/ProductManager/index.php');

    }
} else {
    header('Location: /siteBAR/Views/Admin/ProductManager/index.php');
}

