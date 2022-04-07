<?php

function getArticle($conn, $nb = null , $id = null){

	if ($nb AND !$id) {
		$req = $conn->query('SELECT * FROM products LIMIT' .$nb);
		$article = $req->fetchAll();
	}elseif($id){
		$req = $conn->query('SELECT * FROM products WHERE id ='.$id);
		$article = $req->fetchObject();
	}else{
		$req = $conn->query('SELECT * FROM products ');
		$article = $req->fetch();

	}
	return $article;
}



