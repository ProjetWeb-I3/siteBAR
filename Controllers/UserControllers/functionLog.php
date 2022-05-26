<?php

session_start();

global $LoginLink, $RegisterLink, $BDDlink, $IndexLink, $conn;

$BDDlink = $_SERVER['DOCUMENT_ROOT'].'/Models/DatabaseModel/connect.php';
$LoginLink = $_SERVER['DOCUMENT_ROOT']."/Views/Pages/Authentication/login.php";
$RegisterLink =$_SERVER['DOCUMENT_ROOT']."/Views/Pages/Authentication/Register.php";
$IndexLink = $_SERVER['DOCUMENT_ROOT']."/index.php";


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

			$requser = $conn->prepare('SELECT * FROM users WHERE mail_users =?');
			$requser->execute(array($mailconnect));
			$userexist = $requser->rowCount();

			$userinfo = $requser->fetch();
			$passwordVerif = $userinfo['password_users'];


			if($userexist == 1 )
			{

				if (hash_equals($passwordVerif, crypt($mdpconnect, $passwordVerif)))
				{

					$_SESSION['id_users'] = $userinfo['id_users'];
					$_SESSION['username_users'] = $userinfo['username_users'];
					$_SESSION['mail_users'] = $userinfo['mail_users'];
					header("Location: ".$GLOBALS['URL']."/index.php?id_users=".$_SESSION['id_users']);
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
			$error = "Tous les champs doivent être complétés";
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
                $reqpseudo = $conn->prepare('SELECT * FROM users WHERE username_users = ?');
                $reqpseudo->execute(array($username));
                $pseudoexist = $reqpseudo->rowCount();
//                echo $pseudoexist;
                echo $mail;
                echo $mail2;
                if ($pseudoexist == 0)
                {
                    if ($mail = $mail2)
                    {
                        echo 'ok';
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                        {
                            echo 'okvalide';

                            $reqmail= $conn->prepare('SELECT * FROM users WHERE mail_users = ?');
                            $reqmail->execute(array($mail));
                            $mailexist = $reqmail->rowCount();
                            echo $mailexist;

                            if ($mailexist == 0 )
                            {
                                echo 'ok';
                                if ( $password == $password2)
                                {
                                    $saltMDP= '$6$rounds=5000$baricamstarbarstoulouse$';
                                    $passwordCrypt = crypt($password,$saltMDP);

                                    echo $passwordCrypt;

                                    $insertUser = $conn->prepare('INSERT INTO users (username_users,mail_users,password_users, promotion_users, rank_users, lastname_users, firstname_users) VALUES (?, ?, ?, ?, ?, ?, ?)');

                                    $insertUser->execute(array($username,$mail,$passwordCrypt,$promotion,'PUBLIC',$familyname,$firstname));



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
                        $error = "Adresse mail differentes !";
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
    header("location: ../../../index.php"); // redirige l'utilisateur


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






