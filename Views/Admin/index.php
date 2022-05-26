<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head >

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil - Administration</title>
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL'] . "/public/css/style.css" ?>/>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>
<body class="admin-body">

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/Admin/Layouts/navbarAdmin.php'
?>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/Admin/Layouts/leftNavbarAdmin.php'
?>

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





