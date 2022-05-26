<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADMIN | Membres</title>

    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>


<?php

session_start();

require_once '../../../Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('location:../login.php');
}
?>


<body>

<header id="header">
    <a href="../index.php" class="logo">ADMIN</a>
    <ul>
        <i class="fas fa-users-cog fa-2x"></i>
        <li><a href="../../../Controllers/UserControllers/logout.php">Deconnexion</a></li>
    </ul>

</header>


<div class="admin-wrapper">

    <!-- barre de gauche -->
    <div class="barre-gauche">
        <ul>
            <li><a href="../ProductManager/index.php">Articles</a></li>
            <li><a href="index.php">Membres</a></li>
            <li><a href="#">Mails</a></li>
        </ul>

    </div>


    <!-- contenu admin -->

    <div class="admin-content">
        <div class="button-group">
            <a href="#" class="btn-group">Ajouter</a>
            <!-- <a href="#" class="btn-group">Gerer les Services</a> -->

        </div>

        <div class="content">

            <h2 class="titre-page"> Gerer les Membres</h2>


            <table>
                <thead>
                <th>id</th>
                <th>Pseudo</th>
                <th>Rank</th>
                <th>Mail</th>
                <th colspan="3">Action</th>
                </thead>

                <tbody>


                <?php
                global $conn;
                require_once '../../../Models/DatabaseModel/connect.php';
                $req = $conn->query('SELECT * FROM users');

                $membre = $req->fetchALL();

                foreach ($membre as $membres): ?>


                    <tr>
                        <td><?= $membres['id_users'] ?> </td>
                        <td><?= $membres['lastname_users'] ?> </td>
                        <td><?= $membres['rank_users'] ?> </td>
                        <td><?= $membres['mail_users'] ?> </td>

                        <td>

                            <a href="modifyUser.php?id=<?= $membres['id_users'] ?>" class="modifier">Modifier</a>

                            <a href="IdeaProjects/siteBAR/Controllers/AdminControllers/UserControllers/deleteUser.php?id=<?= $membres['id_users'] ?>"
                               class="supprimer">Supprimer</a>

                            <!-- <a href="#" class="publier">publier</a> -->
                        </td>
                    </tr>

                <?php endforeach ?>

                </tbody>
            </table>

        </div>

    </div>

</div>


</body>
</html>
