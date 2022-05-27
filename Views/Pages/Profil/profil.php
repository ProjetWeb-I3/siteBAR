<?php
session_start();
global $conn;
require_once '../../../Models/DatabaseModel/connect.php';
$getid = $_SESSION['id_users'];
$requser = $conn->prepare('SELECT * FROM users WHERE id_users = ?');
$requser->execute(array($getid));
$userinfo = $requser->fetch();

echo "page profil<br>
Bienvenue ".$userinfo['username_users']." sur le site officiel du bar de L'Icam de Toulouse<br>
Vos informations :<br>
Nom : ".$userinfo['lastname_users']."<br>
prénom : ".$userinfo['firstname_users']."<br>
pseudo : ".$userinfo['username_users']."<br>
Promotion : ".$userinfo['promotion_users']."<br>";
?>