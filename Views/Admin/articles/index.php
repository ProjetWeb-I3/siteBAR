<?php 
	
	session_start(); 

	require_once '../../config/connect.php'; 

	if (!$_SESSION['aadmin']){
		header('location:../login.php');
		}
?>

<!DOCTYPE html>
<html>
<head>


	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>ADMIN | Articles</title>

	<link rel="stylesheet" type="text/css" href="../style/admin.css">
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>

<header id="header">
			<a href="../index.php" class="logo" >ADMIN</a>
			<ul>
				<i class="fas fa-users-cog fa-2x"></i>
				<li><a href="IdeaProjects/siteBAR/Controllers/UserControllers/logout.php">Deconnexion</a></li>
<!-- class="active" onclick="toggle()"-->
				
			</ul>
	
		</header> 


	
	<div class="admin-wrapper">
		
		<!-- barre de gauche -->
		<div class="barre-gauche">
			<ul>
				<li><a href="index.php">Articles</a></li>
				<li><a href="../Membres/index.php">Membres</a></li>
				<li><a href="#">Mails</a></li>
			</ul>
			
		</div>


		<!-- contenu admin -->

		<div class="admin-content">
			<div class="button-group">
				<a href="../fonctionAdminArticle/ajouterArticle.php" class="btn-group">Ajouter</a>
				<a href="#" class="btn-group">Gerer les Articles</a>
				
			</div>
			
			<div class="content">

				<h2 class="titre-page"> Gerer les articles</h2>
				<table>
					<thead>
						<th>id</th>
						<th>Contenu</th>
						<th colspan="3">Action</th>
					</thead>

					<tbody>

					<?php 
						require_once '../../config/connect.php';
						$req = $conn->query('SELECT * FROM articles');

						$article = $req->fetchALL();

						foreach ($article as $articles): ?>


							<tr>
								<td><?= $articles['id'] ?> </td>
								
								<td><?= $articles['title'] ?> : <?php

						              

						              	$comment = $articles['content'];

										if (strlen($comment)>100) 
											{
												$comment=substr($comment, 0, 100);
												$dernier_mot=strrpos($comment," ");
						  						$comment=substr($comment,0,$dernier_mot);
						  						$comment.="...";
												echo $comment;
											}
										else
										{
											echo $comment;
										}

								  ?> </td>


								<td>


									<a href="../fonctionAdminArticle/modifyArticle.php?id=<?= $articles['id'] ?>" class="modifier">Modifier</a>


									<a href="IdeaProjects/siteBAR/Controllers/AdminControllers/ProductController/deleteProduct.php?id=<?= $articles['id'] ?>" class="supprimer">Supprimer</a>


									<a href="#" class="publier">publier</a>
								</td>
							</tr>
							
					<?php endforeach ?>



					</tbody>
				</table>
				

			</div>




		</div>





	</div>	









</body>
</html>