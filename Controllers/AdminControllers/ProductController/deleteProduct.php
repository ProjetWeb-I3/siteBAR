<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('location:../login.php');
}

if (isset($_SESSION['adminBAR']) and !empty($_SESSION['adminBAR'])) {
    if (isset($_GET['id'])) {
        $req = $conn->query('SELECT * FROM products WHERE id_products = ' . $_GET['id']);

        $articles = $req->fetch();
        if ($articles) {
            $req = $conn->query('DELETE FROM products WHERE id_products = ' . $_GET['id']);
            header('location:../articles/index.php');
        } else {
            header('location:../articles/index.php');
        }

    }
} else {
    header('location:../articles/index.php');
}

