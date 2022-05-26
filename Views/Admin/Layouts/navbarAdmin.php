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

<body class="admin-body product-manager">

<header class="header-admin" id="header">
    <a href="../index.php" class="logo">ADMIN</a>
    <ul>
        <i class="fas fa-users-cog fa-2x"></i>
        <li><a href="../../../Controllers/UserControllers/logout.php">Deconnexion</a></li>
    </ul>
</header>
</body>
</html>

