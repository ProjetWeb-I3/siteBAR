<?php

session_start();

//$_SESSION['adminBAR'] = true;

require_once '../../Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil - Administration</title>
    <link rel="stylesheet" type="text/css" href="style/admin.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>


</head>
<body>


<header id="header">
    <a href="index.php" class="logo">ADMIN</a>
    <ul>
        <i class="fas fa-users-cog fa-2x"></i>
        <li><a href="../../Controllers/UserControllers/logout.php">Deconnexion</a></li>
    </ul>
</header>


<div class="admin-wrapper">

    <!-- barre de gauche -->
    <div class="barre-gauche">
        <ul>
            <li><a href="articles/index.php">Articles</a></li>
            <li><a href="Membres/index.php">Membres</a></li>
            <li><a href="#">Mails</a></li>
        </ul>
    </div>


    <!-- contenu admin -->

    <div class="admin-content">
        <div class="button-group">
            <a href="../fonctionAdminArticle/ajouterArticle.php" class="btn-group">Ajouter</a>
            <a href="#" class="btn-group">Gerer les Articles</a>
        </div>

        <div class="content">


        </div>


    </div>


</div>


</body>
</html>





