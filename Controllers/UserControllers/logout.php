<?php


session_start();

require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';


$_SESSION = array();//Ecrase tableau de session
session_unset(); //Detruit toutes les variables de la session en cours
session_destroy();//Destruit la session en cours
header('Location:' . $GLOBALS['URL_CSS']); // redirige l'utilisateur
