<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion au compte admin</title>
	<link rel="stylesheet"  href="style/stylelogin.css">
</head>
<body>




<?php


    require('../Database/connect.php');
    global $conn;
	if (isset($_POST) AND !empty($_POST)) {

        $mailAdmin = htmlspecialchars($_POST['mailAdmin']);
        $passwordAdmin = htmlspecialchars($_POST['passwordAdmin']);

		if (!empty($mailAdmin) AND !empty($passwordAdmin)) {



            $req = $conn->prepare('SELECT * FROM Users WHERE mail = ?' );
			$req -> execute(array($mailAdmin));


            $userinfoAdmin = $req->fetch();
            $userAdmin = $req->rowCount();

            $passwordAdminVerif = $userinfoAdmin['password'];
            $rankAdmin = $userinfoAdmin['rankLevel'];
            echo $rankAdmin;


			if ($userAdmin == 1) {

                if (hash_equals($passwordAdminVerif, crypt($passwordAdmin, $passwordAdminVerif)))
                {
                    if($rankAdmin = 'MEMBER')
                    {
                        $_SESSION['adminBAR'] = $_POST['mailAdmin'];
                        header('location:index.php');
                    }
                    else
                    {
                        $error = "Vous ete pas membre ";
                    }

                }
                else
                {
                    $error = "Mauvais mot de passe ou mail  ";
                }

			}
            else
            {
                $error = "Mauvais mot de passe ou mail  ";
			}


		}else{
			$error = "veuillez remplir tous les champs !";
		}
	}

?>



<div class="center">
	<h1>Se connecter à l'espace ADMINISTRATION</h1>

	<form method="post" action="login.php">

		<div class="txt_field">
			
	        <input type="mail" name="mailAdmin" required>
			<label>identifiant</label>
		</div>
		<div class="txt_field">
			
	        <input name="passwordAdmin" type="password" required>
	        <label>Mot de passe</label>
	        
	    </div>
		<button class="btn">Se connecter</button>
        

    </form>
	
</div>





</body>
</html>