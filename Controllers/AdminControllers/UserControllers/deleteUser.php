<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (!$_SESSION['aadmin']) {
    header('location:../login.php');
}


if (isset($_SESSION['aadmin']) and !empty($_SESSION['aadmin'])) {
    if (isset($_GET['id'])) {
        $req = $conn->query('SELECT * FROM membres WHERE id = ' . $_GET['id']);

        $membres = $req->fetch();
        if ($membres) {
            $req = $conn->query('DELETE FROM membres WHERE id = ' . $_GET['id']);
            header('location:../Membres/index.php');
        } else {
            header('location:../Membres/index.php');
        }

    }
} else {
    header('location:../Membres/index.php');
}
