<?php

require_once "/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER" . '/config.php';
require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';
require('/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Views/Layouts/navbar.php');
require('SendEmailContact.php');
$SendMail = SendMailPHP()
?>



<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['URL_CSS']."/public/css/style.css"?>"/>

    <html lang="fr" >
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Comment Créer un beau Formulaire de Contact en HTML & CSS</title>
        <link
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
                rel="stylesheet"
        />
    </head>
    <body>
    <div class="body-contact">
    <form method="POST" enctype="multipart/form-data" action="">
        <h1>Contactez-nous</h1>
        <div class="separation"></div>
        <div class="corps-formulaire">
            <div class="gauche">
                <div class="groupe">
                    <label class="label">Votre Prénom</label>
                    <input name="Prenom" type="text" autocomplete="off" />
                    <i class="fas fa-user"></i>
                </div>
                <div class="groupe">
                    <label class="label">Votre adresse e-mail</label>
                    <input name="Mail" type="text" autocomplete="off" />
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="groupe">
                    <label class="label">Votre téléphone</label>
                    <input name="Phone" type="text" autocomplete="off" />
                    <i class="fas fa-mobile"></i>
                </div>
            </div>

            <div class="droite">
                <div class="groupe">
                    <label class="label">Message</label>
                    <textarea name="Content" placeholder="Saisissez ici..."></textarea>
                </div>
            </div>
        </div>

        <div class="pied-formulaire" align="center">
            <button name="formMailContact">Envoyer le message</button>
        </div>

        <br/>
        <div class="pied-formulaire" align="center">
            <h2>
                <?php
                $Err = errorFormMail();
                ?>
            </h2>
        </div>
    </form>
    <div>



    </body>
    </html>


