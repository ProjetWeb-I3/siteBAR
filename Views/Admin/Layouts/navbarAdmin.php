<?php
require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/config.php'
?>

<header class="header-admin" id="header">
    <a hhref="<?php echo $GLOBALS['URL_CSS']."/Views/Admin/index.php";?>" class="logo">ADMIN</a>
    <ul>
        <i class="fas fa-users-cog fa-2x"></i>
        <li><a href="<?php echo $GLOBALS['URL_CSS']."/Views/Admin/logout.php";?>">Déconnexion</a></li>
    </ul>
</header>


