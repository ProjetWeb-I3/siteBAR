<?php

	session_start();

	require_once '../../config/connect.php';

	if (!$_SESSION['aadmin']){
		header('location:../login.php');
		}
?>




<?php


            try{
            	if (isset($_POST['upload'])) {
            		$target = "../imagesArticle/".basename($_FILES['image']['name']);



					require_once '../../config/connect.php';


				    $image = $_FILES['image']['name'];
					$text = $_POST['content'];
					$name = $_POST['name'];
					$auteur=$_POST['auteur'];


	                $sql = "INSERT INTO articles (title ,image, content, date, auteur)
	                        VALUES('$name','$image','$text', NOW(),'$auteur')";

	                $conn->exec($sql);
	                echo 'Entrée ajoutée dans la table';
				    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
						$msg = "image importé avec succée";
					}else{
						$msg = "probleme";
					}
            	}

            }

            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
?>












<!DOCTYPE html>
<html>
<head>


	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="siteBAR/Views/Admin/style/admin.scss">
	<title>ADMIN | Ajouter un Article</title>


	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body class="admin-body">

<header class="header-admin" id="header">
			<a href="../index.php" class="logo" >ADMIN</a>
			<ul>
				<i class="fas fa-users-cog fa-2x"></i>
				<li><a href="#"  > Bienvenue <?= $_SESSION['aadmin'] ?> </a></li>
<!-- class="active" onclick="toggle()"-->

			</ul>

		</header>



	<div class="admin-wrapper">

		<!-- barre de gauche -->
		<div class="barre-gauche">
			<ul>
				<li><a href="../ProductManager/index.php">Articles</a></li>
				<li><a href="#">Membres</a></li>
				<li><a href="#">Mails</a></li>
			</ul>

		</div>


		<!-- contenu admin -->

		<div class="admin-content">













				<h2 class="titre-page">Pour modifier un produit</h2>
				<div id="content">
					<form method="post" action="addProduct.php" enctype="multipart/form-data">
						<input type="hidden" name="size" value="1000000">
					 	<div>
					 		<h4 class="titre">Le Titre : </h4>
							<input type="text" name="name">
						</div>
						<div>
					 		<h4 class="titre">Auteur : </h4>
									<select class="select" name='auteur' >
										<option value="">--Selectionner--</option>
										<option value="Charles">Charles</option>
										<option value="Romain">Romain</option>
										<option value="Iban">Iban</option>
										<option value="Julian">Julian</option>
										<option value="Matthieu">Matthieu</option>
										<option value="Nicolas">Nicolas</option>
										<option value="Thibaut">Thibaut</option>
									</select>

						</div>
						<div>
							<h4 class="titre">Ajouter une image (.jpg) : </h4>
							<input type="file" name="image">
						</div>

						<div>
							<h4 class="titre">Le contenu : </h4>
							<textarea  class="area" name="content" cols="40" rows="4" placeholder="Votre texte"></textarea>
						</div>
						<div>
							<!-- <input  type="submit" name="upload" value="Importation">  -->
							<button class="btnp" type="submit" name="upload" value="Importation">Importation</button>
						</div>
					</form>
				</div>



	</div>

</body>
</html>






































