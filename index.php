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

session_start();

require_once('config.php');
require('Models/DatabaseModel/connect.php');
require('Views/Layouts/navbar.php');

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
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
</section>

<?php require('Views/Layouts/footer.php'); ?>

</body>
</html>
