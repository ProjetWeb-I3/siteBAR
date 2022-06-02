<?php
require_once('../../../../../config.php');
require_once('../../../../../Models/DatabaseModel/connect.php');

global $conn, $error;








if(isset($_GET['token']) && $_GET['token'] != '')
{


    $stmt = $conn->prepare('SELECT mail_users FROM users WHERE token_users = ?');
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();

    if($email)
    {
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Récuperation mot de passe</title>
        <link rel="stylesheet" type="text/css" href=
        <?php
        echo $GLOBALS['URL_CSS']."/public/css/style.css";
        ?>
        />

    </head>



    <body class="body-espaceco">



    <div class="center">



        <h1 >Connexion</h1>

        <form method="POST" action="">



            <div class="txt_field">
                <input type="password" name="mailRecup" required>
                <span></span>
                <label for="mail">Votre nouveau mot de passe</label>
            </div>

            <input type="submit" style="margin-bottom: 20px" value="Changer" name="mailbtn">


            <div >
                <h2>
                    <?php
                        echo $error;
                    ?>
                </h2>

            </div>


        </form>



    </div>



    </body>
    </html>


<?php
    if(isset($_POST['mailRecup']))
        {
            global $error;
            //$hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $password = $_POST['mailRecup'];
            $saltMDP = '$6$rounds=5000$baricamstarbarstoulouse$';
            $passwordCrypt = crypt($password, $saltMDP);
            $sql = "UPDATE users SET password_users = ?, token_users = NULL WHERE mail_users = ? ";
            $stmt =$conn->prepare($sql);
            $stmt->execute([$passwordCrypt, $email]);
            echo "votre mot de passe a ete changé !";
        }







    }
    else{
        echo "token pas valide";
    }
}
else {
    echo "token pas valide";
}




?>
