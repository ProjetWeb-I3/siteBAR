<?php

function getArticle($conn, $nb = null , $id = null){

	if ($nb AND !$id) {
		$req = $conn->query('SELECT * FROM articles LIMIT' .$nb);
		$article = $req->fetchAll();
	}elseif($id){
		$req = $conn->query('SELECT * FROM articles WHERE id ='.$id);
		$article = $req->fetchObject();
	}else{
		$req = $conn->query('SELECT * FROM articles ');
		$article = $req->fetchAll();
	}
	return $article;
}

function displayProduct($conn){
    $req_names = $conn->query('SELECT name_products FROM products WHERE quantity_products!=0') ;
    $names = $req_names->fetchall();

    $req_prices = $conn->query('SELECT name_prices FROM products WHERE quantity_products!=0') ;
    $prices = $req_prices->fetchall();
    return $names and $prices;
}

?>


