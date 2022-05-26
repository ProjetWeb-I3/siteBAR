<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAR ICAM TOULOUSE</title>
    <script src="https://kit.fontawesome.com/ad46913740.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
</head>
<body>

<?php

//session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Views/Layouts/navbar.php';

?>


<link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL']."/public/css/style.css"?>/>

<section class="banner" id="home" style="background-image: url(<?php print "Views/img/imageBar/interieur.jpg" ?>);">
    <div class="textBx">
        <h2><span>Bonjour</span><br>Bienvenue sur le site du</h2>
        <h3>Starbars</h3>
        <a href="#propos" class="btnPropos">A propos</a>
    </div>
</section>

<section>
    <p class="p-accueil">Bienvenue sur le site officiel du bar de l'Icam Toulouse ! Sur ce site vous pourrez découvrir nos délicieuses bières,
    et nos adresses préférées ! N'oubliez pas de nous rejoindre sur nos réseaux et n'hésitez pas à nous contacter pour toute
    demande ! </p>
</section>

<?php require('Views/Layouts/footer.php'); ?>

</body>
</html>
