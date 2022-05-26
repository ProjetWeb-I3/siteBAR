<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../../Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('Location: /siteBAR/Views/Admin/login.php');
}
?>

<!DOCTYPE html>
<html class="html-users" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Membres</title>
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL'] . "/public/css/style.css" ?>/>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body class="admin-body">

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/Admin/Layouts/navbarAdmin.php'
?>

<div class="admin-wrapper">

    <!-- barre de gauche -->
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/Admin/Layouts/leftNavbarAdmin.php'
    ?>

    <!-- contenu admin -->

    <div class="admin-content">

        <div class="content">

            <h2 class="titre-page"> Gérer les Membres</h2>

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

                            <a href="/siteBAR/Views/Admin/UserManager/modifyUser.php?id=<?= $membres['id_users'] ?>"
                               class="modifier">Modifier</a>

                            <a href="/siteBAR/Controllers/AdminControllers/UserControllers/deleteUser.php?id=<?= $membres['id_users'] ?>"
                               class="supprimer">Supprimer</a>
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
