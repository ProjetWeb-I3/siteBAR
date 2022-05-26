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
<h1>voici notre panier</h1>


<?php
session_start();
//require_once '../../../Models/DatabaseModel/connect.php';
global $conn;
$user = $_SESSION['id_users'];
echo $user;
$req = $conn->query("SELECT * FROM carts WHERE id_users = '$user'");
$productExist = $req->rowCount();
$produitCart = $req->fetchALL();


if($productExist == 0 ){
    echo "le panier est vide ";
}
else
{

    foreach ($produitCart as $produitsCart): ?>

        <h1><?= $produitsCart['id_products'] ?></h1>
        <h1><?= $produitsCart['quantity_carts'] ?></h1>
        <a href="functionMoreLess.php?MoreLess=0&amp;ref=<?= $produitsCart['id_products'] ?>">-</a>
        <a href="functionMoreLess.php?MoreLess=1&amp;ref=<?= $produitsCart['id_products'] ?>">+</a>
        <a href="functionDELETECart.php?idProductCart=<?= $produitsCart['id_carts'] ?>">Supprimer</a>


    <?php endforeach ?>
    <?php
}
?>












</body>
</html>















<?php require('../../Layouts/footer.php'); ?>







