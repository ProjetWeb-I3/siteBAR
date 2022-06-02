<?php

session_start();

require('/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER'. '/Models/DatabaseModel/connect.php');

$_SESSION = array();
session_unset();
session_destroy();
header('Location :/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' .  '/index.php');
