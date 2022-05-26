<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';
require_once('../../../config.php');
require('../../Layouts/navbar.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cart</title>
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL']."/public/css/style.css"?>/>

</head>
<body>
<h1 id="textPanier">voici notre panier</h1>


<?php

//require_once '../../../Models/DatabaseModel/connect.php';
global $conn;
$user = $_SESSION['id_users'];
//echo $user;
//$req = $conn->query("SELECT * FROM carts WHERE id_users = '$user'");
$req = $conn->prepare("SELECT id_carts , quantity_carts ,carts.id_products , name_products, image_products FROM carts LEFT JOIN products  ON carts.id_products = products.id_products  WHERE carts.id_users   = ?  ");
$req->execute(array($user));
$productExist = $req->rowCount();
$produitCart = $req->fetchALL();


if($productExist == 0 ){
    echo "le panier est vide ";
}
else
{ ?>
    <div class ="cart-container">
<?php    foreach ($produitCart as $produitsCart): ?>
        <div class="product-card">
            <img src="../../Admin/ProductManager/imgProductsBar/<?=$produitsCart['image_products'] ?>" alt="">
            <h2>Produit : <?= $produitsCart['name_products'] ?></h2>
            <h2>Quantité : <?= $produitsCart['quantity_carts'] ?></h2>
            <div class="modify-quantity">
                <a href="functionMoreLess.php?MoreLess=0&amp;ref=<?= $produitsCart['id_products'] ?>">-</a>
                <a href="functionMoreLess.php?MoreLess=1&amp;ref=<?= $produitsCart['id_products'] ?>">+</a><br>
            </div>
            <a href="functionDELETECart.php?idProductCart=<?= $produitsCart['id_carts'] ?>">Supprimer</a>
        </div>

    <?php endforeach ?>
    </div>
    <?php
}
?>












</body>
</html>















<?php require('../../Layouts/footer.php'); ?>







