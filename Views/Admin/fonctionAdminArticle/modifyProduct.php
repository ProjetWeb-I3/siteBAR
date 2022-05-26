<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';

if (!$_SESSION['adminBAR']) {
    header('location:../login.php');
}
?>

<!DOCTYPE html>
<html>
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <title>ADMIN | Articles</title>


    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body class="admin-body">

<header class="header-admin" id="header">
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
            <li><a href="../ProductManager/index.php">Articles</a></li>
            <li><a href="#">Membres</a></li>
            <li><a href="#">Mails</a></li>
        </ul>

    </div>


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

        if (!isset($_SESSION['adminBAR']) || empty($_SESSION['adminBAR'])) {
            header('location:../index.php');
        }

        if (isset($_POST) and !empty($_POST)) {
            if (!empty($_POST['title']) and !empty($_POST['content'])) {


                $req = $conn->prepare('UPDATE articles SET title = :title, content = :content, auteur = :auteur WHERE id = :id');
                $req->execute([


                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'auteur' => $_POST['auteur'],
                    'id' => $_GET['id'],


                ]);
                $_SESSION['flash']['success'] = 'Article modifié';
                header('location:../articles/index.php');

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
            <!-- <form method="post" action="ajouterArticle.php"  enctype="multipart/form-data"> -->
            <form method="POST" enctype="multipart/form-data">
                <h4 class="titre">Le Titre : </h4>
                <input type="text" name="title" value="<?= $articles->name_products ?> "/>
                <div>
                    <h4 class="titre">Auteur : </h4>
                    <select class="select" name='auteur'>
                        <option value="">--Selectionner--</option>
                        <option value="Charles">Charles</option>
                        <option value="Romain">Romain</option>
                        <option value="Iban">Iban</option>
                        <option value="Julian">Julian</option>
                        <option value="Matthieu">Matthieu</option>
                        <option value="Nicolas">Nicolas</option>
                        <option value="Thibaut">Thibaut</option>
                    </select>
                </div>

                <h4 class="titre">Le contenu : </h4>
                <textarea class="area" name="content"><?= $articles->content_products ?></textarea>
                <br/>
                <button class="btnp">Modifier</button>
            </form>
            <a class="btnp" href="modifierImage.php?id=<?= $_GET['id'] ?>">Modifier L'image</a>
        </div>
    </div>
</div>
</body>
</html>
