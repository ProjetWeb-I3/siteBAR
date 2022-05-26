<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('Location: /siteBAR/Views/Admin/login.php');
}

?>

<!DOCTYPE html>
<html class="html-users " lang="fr">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL'] . "/public/css/style.css" ?>/>
    <title>ADMIN | Articles</title>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body class="admin-body">

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/Admin/Layouts/navbarAdmin.php'
?>

<div class="admin-wrapper">

    <!-- barre de gauche -->
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/Admin/Layouts/leftNavbarAdmin.php'
    ?>

    <!-- contenu admin -->

    <div class="admin-content">

        <h2 class="titre-page">Pour modifier un produit</h2>

        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Controllers/AdminControllers/ProductController/getProduct.php';


        $articles = getArticle($conn, 1, $_GET['id']);


        if (!isset($_GET['id'])) {
            header('location:../index.php');
        }

        if (empty($_SESSION['adminBAR'])) {
            header('location:../index.php');
        }

        if (isset($_POST) and !empty($_POST)) {
            if (!empty($_POST['title']) and !empty($_POST['content'])) {


                $req = $conn->prepare('UPDATE products SET name_products = :title, content_products = :content WHERE id_products = :id');
                $req->execute([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'id' => $_GET['id'],
                ]);

                $_SESSION['flash']['success'] = 'Article modifié';
                header('location: /siteBAR/Views/Admin/ProductManager/index.php');

            } else {
                $_SESSION['flash']['error'] = 'champs manquants';

            }
        }
        ?>

        <div class="container">
            <h3 class="titre-page">Modifier l'article "<?= $articles->name_products ?>"</h3>
            <h4 class="titre-page2">Laissez vide si aucun changement</h4>

            <?php
            if (isset($_SESSION['flash']['success'])) {
                echo "<div class='success'>" . $_SESSION['flash']['success'] . '</div>';
            } elseif (isset($_SESSION['flash']['error'])) {
                echo "<div class='error'>" . $_SESSION['flash']['error'] . '</div>';
            }
            ?>

            <form method="POST" enctype="multipart/form-data">
                <h4 class="titre">Nom du produit : </h4>
                <input class="form-text" type="text" name="title" value="<?= $articles->name_products ?> "/>

                <h4 class="titre">Description du produit : </h4>
                <textarea class="form-area" name="content"><?= $articles->content_products ?></textarea>
                <br/>
                <button class="btnp">Modifier</button>
            </form>
            <a class="btnp" href="modifyImage.php?id=<?= $_GET['id'] ?>">Modifier L'image</a>
        </div>
    </div>
</div>
</body>
</html>
