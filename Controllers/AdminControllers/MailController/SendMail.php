<?php
require_once('/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER'.'/config.php');

require_once('/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER'.'/Models/DatabaseModel/connect.php');

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

        $mailA = $_POST['formMailAdress'];
        if(empty($mailA))
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


                $N = count($mailA);


                for($i=0;$i<sizeof($mailA);$i++){


//                    echo $mail[$i].' cochee <br />';
//                }


//                for($i=0; $i < $N; $i++) {
                    echo($mailA[$i]);
//                    $UserMail = strval($mail[$i]);



                    require 'vendor/autoload.php';


                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);


                    //Server settings
//                                    $mail->SMTPDebug = 1;
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
                    $mail->addAddress($mailA[$i]);
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

