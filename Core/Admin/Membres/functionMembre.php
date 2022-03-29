<?php

function getMembre($conn, $nb = null , $id = null){

	if ($nb AND !$id) {
		$req = $conn->query('SELECT * FROM membres LIMIT' .$nb);
		$membre = $req->fetchAll();
	}elseif($id){
		$req = $conn->query('SELECT * FROM membres WHERE id ='.$id);
		$membre = $req->fetchObject();
	}else{
		$req = $conn->query('SELECT * FROM membres ');
		$membre = $req->fetchAll();
	}
	return $membre;
}


?>