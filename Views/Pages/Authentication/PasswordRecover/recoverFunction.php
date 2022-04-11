<?php
require_once('../../../../config.php');

require_once('../../../../Models/DatabaseModel/connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




function recoverPassword()
{
    global $conn;
    $mailRecover = htmlspecialchars($_POST['mail']);

    if(isset($_POST['mailbtn'])) {
        $requser = $conn->prepare('SELECT * FROM users WHERE mail_users =? ');
        $requser->execute(array($mailRecover));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {



            require 'vendor/autoload.php';







            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);


            //Server settings
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->SMTPAuth   = true;
            $mail->Username   = 'starbarsicam@gmail.com';
            $mail->Password   = 'starbars';


            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            //$mail->Port       =    587;

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;

            //Recipients
            $mail->setFrom('starbarsicam@gmail.com', 'starbarsicam@gmail.com');
            $mail->addAddress($mailRecover);
            $mail->addReplyTo('starbarsicam@gmail.com', 'starbarsicam@gmail.com');



            //$mail->addAttachment('g.jpg');


            $mail->isHTML(true);
            $mail->Subject = utf8_decode('Réinitialisation');
            //$mail->Body    = file_get_contents('untitled.html');

            $token = uniqid();

            $url = "http://localhost:63342/siteBAR/Views/Pages/Authentication/PasswordRecover/token?token=$token";

            $mail->Body    = "Bonjour, voici votre lien pour la réinitialisation du mdp  $url";


            if($mail->send())
            {
                $sql = "UPDATE users SET token_users = ? WHERE mail_users = ? ";
                $stmt =$conn->prepare($sql);
                $stmt->execute([$token, $mailRecover]);
                echo 'mail envoyé et token changé ';
            }
            else
            {
                echo 'pas bon';
            }









        }
        else
        {
            echo "Mail attribué à aucun compte ";
        }
    }
}



