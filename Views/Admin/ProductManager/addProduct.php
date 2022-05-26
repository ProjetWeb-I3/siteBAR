<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php'
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL'] . "/public/css/style.css" ?>/>
    <title>ADMIN | Ajouter un Article</title>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>

<header id="header">
    <a href="../index.php" class="logo">ADMIN</a>
    <ul>
        <i class="fas fa-users-cog fa-2x"></i>
        <li><a href="#"> Bienvenue <?= $_SESSION['adminBAR'] ?> </a></li>
    </ul>

</header>

<div class="admin-wrapper">

    <!-- barre de gauche -->
    <div class="barre-gauche">
        <ul>
            <li><a href="/siteBAR/Views/Admin/ProductManager/index.php">Articles</a></li>
            <li><a href="/siteBAR/Views/Admin/UserManager/index.php">Membres</a></li>
            <li><a href="#">Mails</a></li>
        </ul>
    </div>

    <!-- contenu admin -->

    <div class="admin-content">

        <h2 class="titre-page">Pour ajouter un produit</h2>
        <div id="content">
            <form method="post" action="/siteBAR/Controllers/AdminControllers/ProductController/addProduct.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <h4 class="titre">Nom du produit :</h4>
                    <input type="text" name="name">
                </div>
                <div>
                    <h4 class="titre">Image (format jpg) :</h4>
                    <input type="file" name="image">
                </div>

                <div>
                    <h4 class="titre">Description du produit :</h4>
                    <textarea class="area" name="content" cols="40" rows="4" placeholder="Votre texte"></textarea>
                </div>
                <div>
                    <!-- <input  type="submit" name="upload" value="Importation">  -->
                    <button class="btnp" type="submit" name="upload" value="Importation">Importation</button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
