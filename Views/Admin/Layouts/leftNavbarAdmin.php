<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php'
?>


<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADMIN | Membres</title>

    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL'] . "/public/css/style.css" ?>/>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<div class="admin-wrapper">
    <!--barre de gauche-->
    <div class="barre-gauche">
        <ul>
            <li><a href="index.php">Articles</a></li>
            <li><a href="../UserManager/index.php">Membres</a></li>
            <li><a href="#">Mails</a></li>
        </ul>
    </div>
</div>
</html>
