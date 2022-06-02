<?php
//BACKEND
//Récupérer les données de l'utilisateur
session_start();
global $conn;
require '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';

$getid = $_SESSION['id_users'];
$requser = $conn->prepare('SELECT * FROM users WHERE id_users = ?');
$requser->execute(array($getid));
$userinfo = $requser->fetch();


//FRONTEND
//Afficher les données
echo "page profil<br>
Bienvenue ".$userinfo['username_users']." sur le site officiel du bar de L'Icam de Toulouse<br>
Vos informations :<br>
Nom : ".$userinfo['lastname_users']."<br>
prénom : ".$userinfo['firstname_users']."<br>
pseudo : ".$userinfo['username_users']."<br>
Promotion : ".$userinfo['promotion_users']."<br>";
?>
<!--Mdp oublié-->
<div class="pass">
    <a href="../Authentication/PasswordRecover/forgotPassword.php">Mot de passe oublié </a>
</div>

