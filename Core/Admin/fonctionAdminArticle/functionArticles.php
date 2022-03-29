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


?>