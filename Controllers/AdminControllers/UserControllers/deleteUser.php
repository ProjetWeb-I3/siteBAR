<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('Location: /siteBAR/Views/Admin/login.php');
}

if (isset($_SESSION['adminBAR']) and !empty($_SESSION['adminBAR'])) {
    if (isset($_GET['id'])) {
        $req = $conn->query('SELECT * FROM membres WHERE id = ' . $_GET['id']);

        $membres = $req->fetch();
        if ($membres) {
            $req = $conn->query('DELETE FROM membres WHERE id = ' . $_GET['id']);
        }
        header('Location: /siteBAR/Views/Admin/UserManager/index.php');
    }
} else {
    header('Location: /siteBAR/Views/Admin/UserManager/index.php');
}
