<?php 
	
	session_start(); 

	require_once '../../config/connect.php'; 

	if (!$_SESSION['aadmin']){
		header('location:../login.php');
		}




            	if (isset($_POST['change']) AND !empty($_POST['change'])) {

            		$target = "../imagesArticle/".basename($_FILES['image']['name']);
					require_once '../../config/connect.php'; 
	                

				    // $image = $_FILES['image']['name'];
					


	                
	                $sql = $conn->prepare('UPDATE articles SET image = :image WHERE id = :id');


							
							$sql->execute([


								'image' => $_FILES['image']['name'],
								'id' => $_GET['id'],
								


							]);



	             
	                echo 'Entrée ajoutée dans la table';
				    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
						$msg = "image importé avec succée";
					}else{
						$msg = "probleme";
					}







            		
            	}
            	else
            	{
            		echo "pas cool";
            	}














?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Modification image</h1>


	<form method="POST" enctype="multipart/form-data">
				

				<h4 class="titre">Ajouter une image (.jpg) : </h4>
				<input type="file" name="image">

				<br/>

				<button class="btnp" type="submit" name="change" value="Modifier">Modifier </button>
			
	</form>











</body>
</html>