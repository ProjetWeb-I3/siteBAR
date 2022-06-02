<?php
require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/config.php'
?>

<!DOCTYPE html>
<html class="html-users" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['URL_CSS'] . "/public/css/style.css" ?>"/>
    <title>ADMIN | Ajouter un Article</title>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- barre de gauche -->
    <?php
    require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Views/Admin/Layouts/navbarAdmin.php'
    ?>

<div class="admin-wrapper">
    <?php
    require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Views/Admin/Layouts/leftNavbarAdmin.php'
    ?>

    <!-- contenu admin -->

    <div class="admin-content">

        <h2 class="titre-page">Pour ajouter un produit</h2>
        <div id="content">
            <form method="post" action="/siteBAR/Controllers/AdminControllers/ProductController/addProduct.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">

                <div>
                    <h4 class="titre">Nom du produit :</h4>
                    <input class="form-text" type="text" name="name">
                </div>

                <div>
                    <h4 class="titre">Image (format jpg) :</h4>
                    <input type="file" name="image">
                </div>

                <div>
                    <h4 class="form-titre">Description du produit :</h4>
                    <textarea class="form-area" name="content" cols="40" rows="4" placeholder="Votre texte"></textarea>
                </div>
                <div>
                    <button class="btnp" type="submit" name="upload" value="Importation">Importation</button>
                </div>
            </form>
        </div>

    </div>
</div>

</body>
</html>
