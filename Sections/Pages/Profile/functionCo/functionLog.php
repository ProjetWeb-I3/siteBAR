<?php

session_start();

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

global $LoginLink, $RegisterLink, $BDDlink, $IndexLink, $conn;

$BDDlink='../../../../Core/Database/connect.php';
$LoginLink = "../espaceCo/login.php";
$RegisterLink = "../espaceCo/Register.php";
$IndexLink = "../../../../index.php";




function VerifLogin()
{

	
	global $error, $BDDlink, $conn;
	require($BDDlink);
	
	if (isset($_POST['formconnexion'])) 
	{
		$mailconnect = htmlspecialchars($_POST['mailconnect']);
		$mdpconnect = $_POST['mdpconnect'];

		if(!empty($mailconnect) AND !empty($mdpconnect))
		{
			
			$requser = $conn->prepare('SELECT * FROM Users WHERE mail =?');
			$requser->execute(array($mailconnect));
			$userexist = $requser->rowCount();

			$userinfo = $requser->fetch();
			$passwordVerif = $userinfo['password'];

		
			if($userexist == 1 )
			{
				
				if (hash_equals($passwordVerif, crypt($mdpconnect, $passwordVerif)))
				{
						
					$_SESSION['id_user'] = $userinfo['id_user'];
					$_SESSION['username'] = $userinfo['username'];
					$_SESSION['mail'] = $userinfo['mail'];
					header("Location: ../../../../index.php?id_user=".$_SESSION['id_user']);
					$requser->closeCursor();


				}		
				else
				{
					$error ="Mauvais Mail ou Mot de passe !";
				}


			}
			else
			{
				$error ="Mauvais Mail ou Mot de passe !";
			}

		}
		else
		{
			$error = "Tous les champs doivent être complété";
		}	


	}




	
}




// Voici notre fonction de verification pour l'inscription
function Register()
{

    global $error , $firstname , $familyname , $mail2 , $mail , $username, $BDDlink, $conn,$inscripOK;

    require($BDDlink);
    if(isset($_POST['forminscription']))
    {
        $username = htmlspecialchars($_POST['username']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $familyname = htmlspecialchars($_POST['familyname']);
        $promotion = htmlspecialchars($_POST['promotion']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $password = ($_POST['password']);
        $password2 = ($_POST['password2']);



        if(!empty($_POST['username']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['firstname']) AND !empty($_POST['familyname']) AND !empty($_POST['firstname']) AND !empty($_POST['promotion']))
        {

            $pseudolenght = strlen($username);
            if ( $pseudolenght <= 255 )
            {

                // on verifie si notre pseudo existe deja
                $reqpseudo = $conn->prepare('SELECT * FROM Users WHERE username = ?');
                $reqpseudo->execute(array($username));
                $pseudoexist = $reqpseudo->rowCount();
                echo $pseudoexist;

                if ($pseudoexist == 0)
                {
                    if ($mail == $mail2)
                    {
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                        {

                            $reqmail= $conn->prepare('SELECT * FROM Users WHERE mail = ?');
                            $reqmail->execute(array($mail));
                            $mailexist = $reqmail->rowCount();
                            echo $mailexist;

                            if ($mailexist == 0 )
                            {
                                if ( $password == $password2)
                                {
                                    $saltMDP= '$6$rounds=5000$baricamstarbarstoulouse$';
                                    $passwordCript = crypt($password,$saltMDP);

                                    echo $passwordCript;

                                    $insertUser = $conn->prepare('INSERT INTO Users (username,mail,password, promotion, rankLevel, familyname, firstname) VALUES (?, ?, ?, ?, ?, ?, ?)');

                                    $insertUser->execute(array($username,$mail,$passwordCript,$promotion,'MEMBER',$familyname,$firstname));


                                    // Pour l'envoie de mail de confirmation
//
//                                    require 'vendor/autoload.php';
//                                    $mailSend = new PHPMailer(true);
//                                    $mailSend->SMTPDebug = 1;
//                                    $mailSend->isSMTP();
//                                    $mailSend->SMTPAuth = true ;
//
//                                    $mailSend->Username = 'charlesgte31@gmail.com';
//                                    $mailSend->Password   = 'rambogte260101';
//                                    $mailSend->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//                                    $mailSend->Host = 'smtp.gmail.com';
//                                    $mailSend->Port = 465;
//
//                                    $mailSend->setFrom('charlesgte31@gmail.com');
//                                    $mailSend->addAddress('charlesgte31@gmail.com');
//                                    $mailSend->addReplyTo('charlesgte31@gmail.com', 'charlesgte31@gmail.com');
//
//                                    $mailSend->isHTML(true);
//                                    $mailSend->Subject = utf8_decode('INSCRIPTION');
//
//                                    $mailSend->Body = "<h3> username : $username <br/> Nom : $familyname <br/>Prénom : $firstname <br/>Email: $mail <br/> MERCI DE VOTRE INSCRIPTION </h3>";
//
//
//
//                                    $mailSend->send();
                                    $inscripOK = 'votre compte a bien été créé et Mail envoyé !';


                                }
                                else
                                {

                                    $error= "vos mots de passes ne correspondent pas !";
                                }
                            }
                            else
                            {
                                $error = "Adresse mail déjà utilisée !";
                            }

                        }
                        else
                        {
                            $error = "Votre adresse mail n'est pas valide !";
                        }

                    }
                    else
                    {
                        $error = "Adresse mail déjà utilisée !";
                    }


                }
                else
                {
                    $error = "Pseudo déjà utilisé !";
                }

            }
            else
            {
                $error ="votre pseudo ne doit pas depasser 255 carctère !";
            }

        }
        else
        {
            $error = "Tous les champs doivent être complété";
        }
    }
}




function Deconnexion()
{



    session_start();
    global $BDDlink;
    require($BDDlink);


    $_SESSION = array();//Ecrase tableau de session
    session_unset(); //Detruit toutes les variables de la session en cours
    session_destroy();//Destruit la session en cours
    header("location: ../../../../index.php"); // redirige l'utilisateur


}








function errorForm()
{

    global $error,$inscripOK;
    if(isset($error))
    {
        echo $error;

    }
    if(isset($inscripOK))
    {
        echo $inscripOK;

    }

}






