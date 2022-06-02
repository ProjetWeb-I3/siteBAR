<?php
require_once "/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER" . '/config.php';


require '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';


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

    if (isset($_POST['formMailContact'])) {
        echo "ok";

        $MailContent = $_POST['Content'];
        $PhoneContent = $_POST['Phone'];
        $mailU = $_POST['Mail'];
        $NameContent = $_POST['Prenom'];






        if(empty($mailU))
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






                    require 'vendor/autoload.php';


                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);


                    //Server settings
                    //                $mail->SMTPDebug = 1;
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Username = 'starbarsicam@gmail.com';
                    $mail->Password = 'vvlhpghobdikdmhs';


                    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    //$mail->Port       =    587;

                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465;

                    //Recipients
                    $mail->setFrom('starbarsicam@gmail.com', 'starbarsicam@gmail.com');
                    $mail->addAddress("starbarsicam@gmail.com");
                    $mail->addReplyTo('starbarsicam@gmail.com', 'starbarsicam@gmail.com');


                    //$mail->addAttachment('g.jpg');


                    $mail->isHTML(true);
                    $mail->Subject = utf8_decode('Contact Starbars : '.$NameContent);
                    //$mail->Body    = file_get_contents('untitled.html');

                    $mail->Body = "Nom : {$NameContent} <br/>
                                  Phone : {$PhoneContent} <br/>
                                   Mail  : {$mailU} <br/>
                                   Contenu : <br/> {$MailContent}
                                   "  ;
                    $mail->send();
                    $error = 'Mail envoyé';

                }
            }
        }



}
