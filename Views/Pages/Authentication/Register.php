<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" href="IdeaProjects/siteBAR/Views/Pages/Authentication/styleEspaceCo.scss">
</head>
<body>


<?php 


require('../functionCo/functionLog.php');
$inscription = register();
global $IndexLink, $RegisterLink;

?>

<div class="center">
	

	<h1>Inscription</h1>


		<form method="POST" action="">


			<div class="txt_field">
				<input type="text" id="username" required name="username" value="<?php if(isset($username)) { echo $username; }?>">
				<span></span>
				<label for="username">Pseudo</label>
			</div>
				
			<div class="txt_field">
				<input type="text" id="familyname" required name="familyname" value="<?php if(isset($familyname)) { echo $familyname; }?>">
				<span></span>
				<label for="familyname">Nom</label>
			</div>			

			<div class="txt_field">
				<input type="text" id="firstname"  required name="firstname" value="<?php if(isset($firstname)) { echo $firstname; }?>">
				<span></span>
				<label for="firstname">Prénom</label>
			</div>

			<div class="txt_field">
				<input type="email"  id="mail" required name="mail" value="<?php if(isset($mail)) { echo $mail; }?>">
				<span></span>
				<label for="mail">Mail</label>

			</div>


			<div class="txt_field">
				<input type="email" id="mail2"  required name="mail2" value="<?php if(isset($mail2)) { echo $mail2; }?>">
				<span></span>
				<label for="mail2">Confirmation mail</label>
			</div> 





			<div >
				
			
				<select id="promotion" required name="promotion">
		   
				<?php
						for ($i=0; $i<7; $i++) {
				?>
						    <option valeur="I12<?= $i ?>">I12<?= $i ?></option>
				<?php
						}
				?>



				<?php
						for ($i=0; $i<7; $i++) {
				?>
						    <option valeur="A12<?= $i ?>">A12<?= $i ?></option>
				<?php
						}
				?>

				   					
				</select>
				<label for="promotion">Promotion</label>
		
				
			</div>







			<div class="txt_field">
				<input type="password" id="password" name="password" required>
				<span></span>
				<label for="password" >Mot de passe</label>
			</div>




			<div class="txt_field">
				<input type="password" id="password2" name="password2" required>
				<span></span>
				<label for="password2">Confirmation mot de passe</label>
			</div>




			<input type="submit" value="Je m'inscris" name="forminscription">


			<div class="signup_link">
				Déjà membre ?<a href="IdeaProjects/siteBAR/Views/Pages/Authentication/login.php"> Connexion</a><a href="<?php echo $IndexLink ; ?>"> / Retour</a><br\>
                <br/>
                <br/>
                <?php

                if(isset($error))
                {
                    echo '<font color="red">'.$error."</font>";
                }
                if(isset($inscripOK))
                {
                    echo '<font color="green">'.$inscripOK."</font>";
                }

                ?>




			</div>







		</form>

	







</div>


</body>
</html>