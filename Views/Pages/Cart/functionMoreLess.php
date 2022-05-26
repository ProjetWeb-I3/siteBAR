<?php

session_start();

global $user,$MoreLess,$ref;
require_once '../../../Models/DatabaseModel/connect.php';
global $conn;


$user = $_SESSION['id_users'];
$MoreLess = $_GET['MoreLess'];
$ref = $_GET["ref"];

$req = $conn->query("SELECT * FROM carts WHERE id_products = '$ref' AND id_users = '$user' ");
$request = $req->fetch();
$QTY = $request['quantity_carts'];



	if ($MoreLess == 0)
	{

			
			
			$QTYNew = $QTY - 1;
			$req2 = $conn->exec("UPDATE carts SET quantity_carts = '$QTYNew' WHERE id_products = '$ref' AND id_users = '$user' ");
			header('location:cart.php');
			
			if ($QTYNew == 0 )
			{
				$req = $conn->query("DELETE FROM carts WHERE id_products = '$ref' ");
				header('location:cart.php');
			}
	}
	else
	{


			$QTYNew = $QTY + 1;
			$req2 = $conn->exec("UPDATE carts SET quantity_carts = '$QTYNew' WHERE id_products = '$ref' AND id_users = '$user' ");

			header('location:cart.php');	

	}





?>





