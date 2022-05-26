<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../../Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('location:../login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Articles</title>
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL']."/public/css/style.css"?>/>
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

<div class="admin-wrapper">

    <!-- barre de gauche -->
    <div class="barre-gauche">
        <ul>
            <li><a href="index.php">Articles</a></li>
            <li><a href="../UserManager/index.php">Membres</a></li>
            <li><a href="#">Mails</a></li>
        </ul>
    </div>

    <!-- contenu admin -->

    <div class="admin-content">

        <div class="button-group">
            <a href="../fonctionAdminArticle/addProduct.php" class="btn-group">Ajouter</a>
            <a href="#" class="btn-group">Gerer les Articles</a>
        </div>

        <div class="content ">
            <h2 class="titre-page"> Gerer les articles</h2>
            <table class="product-managerFontsizetable">
                <thead>
                <th>id</th>
                <th>Contenu</th>
                <th colspan="3">Action</th>
                </thead>
                <tbody>

                <?php

                global $conn;
                require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

                $req = $conn->query('SELECT * FROM products');
                $product = $req->fetchALL();

                foreach ($product as $products): ?>

                    <tr>
                        <td><?= $products['id_products'] ?> </td>

                        <td><?= $products['name_products'] ?> : <?php

                            $comment = $products['content_products'];

                            if (strlen($comment) > 100) {
                                $comment = substr($comment, 0, 100);
                                $dernier_mot = strrpos($comment, " ");
                                $comment = substr($comment, 0, $dernier_mot);
                                $comment .= "...";
                            }
                            echo $comment;

                            ?>

                        </td>

                        <td>

                            <a href="../fonctionAdminArticle/modifyProduct.php?id=<?= $products['id_products'] ?>"
                               class="modifier">Modifier</a>

                            <a href="/siteBAR/Controllers/AdminControllers/ProductController/deleteProduct.php?id=<?= $products['id_products'] ?>" class="supprimer">Supprimer</a>

                            <a href="#" class="publier">publier</a>
                        </td>
                    </tr>

                <?php endforeach ?>

                </tbody>
            </table>

        </div>

    </div>

</div>

</body>
</html>
