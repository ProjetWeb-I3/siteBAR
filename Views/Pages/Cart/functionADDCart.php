<!-- pour Ajouter un produit -->

<?php

session_start();
require_once 'connect.php';



if (isset($_SESSION['id_user']) AND !empty($_SESSION['id_user']))

{	
	if (isset($_GET['refProductCart'])) 
	{
		$ref= $_GET['refProductCart'] ; 
		$user = $_SESSION['id_user'];
		$req = $conn->prepare('SELECT * FROM Carts WHERE refProductCart =? AND UserIdCart = ?');
		$req->execute(array($ref,$user));
		$ProductExistCart = $req->rowCount();
		
		if ($ProductExistCart == 0)
		{
			
			$qtyProduct= "1";
			$req2 = $conn->query("INSERT INTO Carts (refProductCart, UserIdCart, quantity_product) VALUES ('$ref','$user' ,'$qtyProduct')");
			header('location:produits.php');
		}
		else
		{
			
			$req3 = $conn->query("SELECT * FROM Carts WHERE refProductCart = '$ref' AND UserIdCart = '$user' ");
			
			$request = $req3->fetch();
			$QTY = $request['quantity_product'] + 1;
			$req4 = $conn->exec("UPDATE Carts SET quantity_product = '$QTY' WHERE refProductCart = '$ref' AND UserIdCart = '$user' ");
			header('location:produits.php');

			
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