<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('Location: /siteBAR/Views/Admin/login.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL'] . "/public/css/style.css" ?>/>
    <title>ADMIN | Membre</title>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>

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

        <h2 class="titre-page">Pour modifier un Membre</h2>

        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Controllers/AdminControllers/UserControllers/getUser.php';

        $membres = getMembre($conn, 1, $_GET['id']);

        if (!isset($_GET['id'])) {
            header('location:index.php');
        }

        if (empty($_SESSION['adminBAR'])) {
            header('location:index.php');
        }

        if (isset($_POST) and !empty($_POST)) {
            if (!empty($_POST['pseudo']) and !empty($_POST['mail'])) {

                $req = $conn->prepare('UPDATE users SET username_users = :pseudo, mail_users = :mail WHERE id_users = :id');
                $req->execute([

                    'pseudo' => $_POST['pseudo'],
                    'mail' => $_POST['mail'],
                    'id' => $_GET['id'],

                ]);

                $_SESSION['flash']['success'] = 'Article modifié';
                header('location:index.php');

            } else {
                $_SESSION['flash']['error'] = 'champs manquants';
            }
        }
        ?>

        <div class="container">

            <h3 class="titre-page">Modifier Le Membre : "<?= $membres->username_users ?>"</h3>
            <h4 class="titre-page2">Laissez vide si aucun changement</h4>

            <?php
            if (isset($_SESSION['flash']['success'])) {
                echo "<div class='success'>" . $_SESSION['flash']['success'] . '</div>';
            } elseif (isset($_SESSION['flash']['error'])) {
                echo "<div class='error'>" . $_SESSION['flash']['error'] . '</div>';
            }
            ?>

            <form method="POST" enctype="multipart/form-data">
                <h4 class="titre">Le Pseudo : </h4>
                <input type="text" name="pseudo" value="<?= $membres->username_users ?> "/>

                <h4 class="titre">Le Mail : </h4>
                <textarea class="area" name="mail"><?= $membres->mail_users ?></textarea>

                <br/>
                <button class="btnp">Modifier</button>

            </form>

        </div>

    </div>
</div>

</body>
</html>























