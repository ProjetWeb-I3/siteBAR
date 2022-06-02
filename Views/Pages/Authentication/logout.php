<?php

require_once('../../../config.php');
session_start();
require('../../../Controllers/UserControllers/functionLog.php');
$Deconnexion = Deconnexion();

?>

<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['URL_CSS']."/public/css/style.css"?>"/>
