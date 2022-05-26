<!-- pour supprimer un produit -->

<?php

session_start();
require_once '../../../Models/DatabaseModel/connect.php';
global $conn;


if (isset($_SESSION['id_users']) AND !empty($_SESSION['id_users'])){
	if (isset($_GET['idProductCart'])) {
        echo $_GET['idProductCart'] ;
		$req = $conn->query('SELECT * FROM carts WHERE id_carts = ' .$_GET['idProductCart']);

		$produits = $req->fetch();
		if ($produits) {
			$req = $conn->query('DELETE FROM carts WHERE id_carts = ' .$_GET['idProductCart']);
			header('location:cart.php');
		}else{
			header('location:cart.php');
		}





		
	}
}else{
	header('location:../../../index.php');
}





?>
