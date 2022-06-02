<?php

require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';

if (isset($_GET['id'])) {

    $req = $conn->query('SELECT * FROM products WHERE id_products = ' . $_GET['id']);
    $articles = $req->fetch();

    if ($articles) {
        $req = $conn->query('DELETE FROM products WHERE id_products = ' . $_GET['id']);
    }
    header('Location:' . $GLOBALS["URL"] . '/Views/Admin/ProductManager/index.php');

}
