<!-- pour supprimer un produit -->

<?php

session_start();
require_once '../../../Models/DatabaseModel/connect.php';
global $conn;


if (isset($_SESSION['id_users']) AND !empty($_SESSION['id_users'])){
	if (isset($_GET['id_products'])) {
		$req = $conn->query('SELECT * FROM carts WHERE id_cart = ' .$_GET['id_products']);

		$produits = $req->fetch();
		if ($produits) {
			$req = $conn->query('DELETE FROM carts WHERE id_cart = ' .$_GET['id_products']);
			header('location:cart.php');
		}else{
			header('location:cart.php');
		}





		
	}
}else{
	header('location:../../../index.php');
}





?>
