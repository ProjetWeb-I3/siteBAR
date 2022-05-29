<?php
require_once('../../../config.php');

require_once('../../../Models/DatabaseModel/connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




function errorFormMail()
{

    global $error;
    if (isset($error)) {
        echo $error;

    }


}


function SendMailPHP()
{
    global $conn, $error;

    if (isset($_POST['formMail'])) {

        $MailContent = $_POST['Content'];

        $mail = $_POST['formMailAdress'];
        if(empty($mail))
        {

            $error = 'Selectionnez des utilisateurs';
        }
        else
        {
            if(empty($MailContent))
            {
                $error = 'Entrez votre message';

            }
            else{


                $N = count($mail);



                for($i=0; $i < $N; $i++) {
                    echo($mail[$i]);
                    $UserMail = strval($mail[$i]);


                    require 'vendor/autoload.php';


                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);


                    //Server settings
                    //                $mail->SMTPDebug = 1;
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Username = 'starbarsicam@gmail.com';
                    $mail->Password = 'starbars';


                    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    //$mail->Port       =    587;

                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465;

                    //Recipients
                    $mail->setFrom('starbarsicam@gmail.com', 'starbarsicam@gmail.com');
                    $mail->addAddress($UserMail);
                    $mail->addReplyTo('starbarsicam@gmail.com', 'starbarsicam@gmail.com');


                    //$mail->addAttachment('g.jpg');


                    $mail->isHTML(true);
                    $mail->Subject = utf8_decode('Newsletter Starbars');
                    //$mail->Body    = file_get_contents('untitled.html');

                    $mail->Body = $MailContent;
                    $mail->send();
                    $error = 'Mail envoyé';

                }
            }
        }


    }
}

