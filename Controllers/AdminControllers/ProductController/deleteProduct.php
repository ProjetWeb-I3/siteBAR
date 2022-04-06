<?php 
	
	session_start(); 

	require_once '../../config/connect.php'; 

	if (!$_SESSION['aadmin']){
		header('location:../login.php');
		}



if (isset($_SESSION['aadmin']) AND !empty($_SESSION['aadmin'])){	
	if (isset($_GET['id'])) {
		$req = $conn->query('SELECT * FROM articles WHERE id = ' .$_GET['id']);

		$articles = $req->fetch();
		if ($articles) {
			$req = $conn->query('DELETE FROM articles WHERE id = ' .$_GET['id']);
			header('location:../articles/index.php');
		}else{
			header('location:../articles/index.php');
		}





		
	}
}else{
	header('location:../articles/index.php');
}





?>