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
	<link rel="stylesheet" type="text/css" href="../style/admin.css">
	<title>ADMIN | Membre</title>


	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>

<header id="header">
			<a href="../index.php" class="logo" >ADMIN</a>
			<ul>
				<i class="fas fa-users-cog fa-2x"></i>
				<li><a href="../deconnexion.php">Deconnexion</a></li>
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
			
			


				<h2 class="titre-page">Pour modifier un Membre</h2>



				<?php

					require_once '../../config/connect.php';
					require_once 'functionMembre.php';

					
					$membres =  getMembre($conn,1, $_GET['id']);


					if (!isset($_GET['id'])) {
						header('location:index.php');
					}

					if (!isset($_SESSION['aadmin']) || empty($_SESSION['aadmin'])) {
						header('location:index.php');
					}

					if (isset($_POST) AND !empty($_POST) ) {
						if (!empty($_POST['pseudo']) AND !empty($_POST['mail'])) {


							$req = $conn->prepare('UPDATE membres SET pseudo = :pseudo, mail = :mail WHERE id = :id');
							$req->execute([




								'pseudo' => $_POST['pseudo'],
								'mail' => $_POST['mail'],	
								'id' => $_GET['id'],
								


							]);






							$_SESSION['flash']['success'] = 'Article modifié' ;
							header('location:index.php');
							
						}else{
							$_SESSION['flash']['error'] = 'champs manquants' ;

						}
					}
				?>



				<div class="container">

				<h3 class="titre-page">Modifier Le Membre : "<?= $membres->pseudo ?>"</h3>
				<h4 class="titre-page2">Laissez vide si aucun changement</h4>

				<?php 
					if (isset($_SESSION['flash']['success'])) {
						echo "<div class='success'>".$_SESSION['flash']['success']. '</div>';
					}elseif (isset($_SESSION['flash']['error'])) {
						echo "<div class='error'>".$_SESSION['flash']['error']. '</div>';
					}


				?>
					
				<form method="POST" enctype="multipart/form-data">
					<h4 class="titre">Le Pseudo : </h4>
					<input type="text" name="pseudo" value="<?= $membres->pseudo ?> "/>


					<h4 class="titre">Le Mail : </h4>
						<textarea class="area" name="mail"><?= $membres->mail ?></textarea>

					<br/>
					<button class="btnp">Modifier</button>
	
				</form>

				

				</div>



















		</div>
	</div>	









</body>
</html>























