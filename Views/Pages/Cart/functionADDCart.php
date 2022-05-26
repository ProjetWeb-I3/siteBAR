<!-- pour Ajouter un produit -->

<?php

session_start();
require_once '../../../Models/DatabaseModel/connect.php';
global $conn;



if (isset($_SESSION['id_users']) AND !empty($_SESSION['id_users']))

{	
	if (isset($_GET['refProductCart'])) 
	{
		$ref= $_GET['refProductCart'] ;
        echo $_GET['refProductCart'];
		$user = $_SESSION['id_users'];
		$req = $conn->prepare('SELECT * FROM carts WHERE id_products =? AND id_users = ?');
		$req->execute(array($ref,$user));
		$ProductExistCart = $req->rowCount();

		
		if ($ProductExistCart == 0)
		{
			
			$qtyProduct= "1";
			$req2 = $conn->query("INSERT INTO carts (id_products, id_users, quantity_carts) VALUES ('$ref','$user','$qtyProduct')");
			header('location:../products/products.php');
		}
		else
		{
			
			$req3 = $conn->query("SELECT * FROM carts WHERE id_products = '$ref' AND id_users = '$user' ");
			
			$request = $req3->fetch();
			$QTY = $request['quantity_carts'] + 1;
			$req4 = $conn->exec("UPDATE carts SET quantity_carts = '$QTY' WHERE id_products = '$ref' AND id_users = '$user' ");
			header('location:../products/products.php');

			
		}

		


	}
	else
	{
		header('location:produits.php');
	}
	





		
	
}
else
{
	header('location:index.php');
}





?>