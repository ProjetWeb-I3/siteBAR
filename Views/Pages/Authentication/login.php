<?php require_once('../../../config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>connexion</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['URL_CSS']."/public/css/style.css"?>"/>
</head>
<body class="body-espaceco">


<?php

require('../../../Controllers/UserControllers/functionLog.php');
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
					<a href="PasswordRecover/forgotPassword.php">Mot de passe oublié ?</a>
				</div>


				<input type="submit"  value="Connexion" name="formconnexion">

				<div class="signup_link">
					Pas encore membre ?<a href="<?php echo $GLOBALS['URL_CSS']."/Views/Pages/Authentication/register.php" ?>"> Inscrivez-vous</a><br\>
					<a href="<?php echo $GLOBALS['URL_CSS']."/index.php" ; ?>">/ Retour</a><br\>
				</div>
<!--                '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER'-->
				<div class="errorForm">
					<h2>
						<?php $Err = errorForm(); ?>
					</h2>

				</div>




			</form>


</div>
</body>
</html>
