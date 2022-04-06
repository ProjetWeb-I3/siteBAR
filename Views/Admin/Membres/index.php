<!DOCTYPE html>
<html>
<head>


	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>ADMIN | Membres</title>

	<link rel="stylesheet" type="text/css" href="../style/admin.css">
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>



<?php 
	
	session_start(); 

	require_once '../../config/connect.php'; 

	if (!$_SESSION['aadmin']){
		header('location:../login.php');
		}
?>




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
				<li><a href="../articles/index.php">Articles</a></li>
				<li><a href="index.php">Membres</a></li>
				<li><a href="#">Mails</a></li>
			</ul>
			
		</div>


		<!-- contenu admin -->

		<div class="admin-content">
			<div class="button-group">
				<a href="#" class="btn-group">Ajouter</a>
				<!-- <a href="#" class="btn-group">Gerer les Services</a> -->
				
			</div>
			
			<div class="content">

				<h2 class="titre-page"> Gerer les Membres</h2>
			
				



				<table>
					<thead>
						<th>id</th>
						<th>Pseudo</th>
						<th>Mail</th>
						<th colspan="3">Action</th>
					</thead>

					<tbody>



					<?php 
						require_once '../../config/connect.php';
						$req = $conn->query('SELECT * FROM membres');

						$membre = $req->fetchALL();

						foreach ($membre as $membres): ?>


							<tr>
								<td><?= $membres['id'] ?> </td>
								
								<td><?= $membres['pseudo'] ?> </td>

								<td><?= $membres['mail'] ?> </td>


								<td>


									<a href="modifierMembre.php?id=<?= $membres['id'] ?>" class="modifier">Modifier</a>


									<a href="IdeaProjects/siteBAR/Controllers/AdminControllers/UserControllers/deleteUser.php?id=<?= $membres['id'] ?>" class="supprimer">Supprimer</a>


									<!-- <a href="#" class="publier">publier</a> -->
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