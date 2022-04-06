<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>connexion</title>
	<link rel="stylesheet" type="text/css" href="styleEspaceCo.css">
</head>
<body>


<?php 

require('../functionCo/functionLog.php');
$connexion = VerifLogin();
global $IndexLink, $RegisterLink;
?>

<div class="center">
	

	<h1 >Connexion</h1>

			<form method="POST" action="">

				<div class="txt_field">
					<input id="mailconnect" type="mail" required name="mailconnect" >
					<span></span>	
					<label for="mailconnect">Mail</label>
				</div>


				<div class="txt_field">
					<input id="mdpconnect" type="password" required name="mdpconnect" 
					>		
					<span></span>
					<label for="mdpconnect">Mot de passe</label>
				</div>


				<div class="pass">
					<a href="#">Mot de passe oublié ?</a>
				</div>


				<input type="submit"  value="Connexion" name="formconnexion">	
				
				<div class="signup_link">
					Pas encore membre ?<a href="<?php echo $RegisterLink ; ?>"> Inscrivez-vous</a><br\>
					<a href="<?php echo $IndexLink ; ?>">/ Retour</a><br\>
				</div>

				<div class="errorForm">
					<h2>
						<?php $Err = errorForm(); ?>
					</h2>

				</div>
				

				
				
			</form>


</div>
</body>
</html>