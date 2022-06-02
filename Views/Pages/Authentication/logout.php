<?php

require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/config.php';
session_start();
require '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Controllers/UserControllers/functionLog.php';
$Deconnexion = Deconnexion();

?>

<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['URL_CSS']."/public/css/style.css"?>"/>
