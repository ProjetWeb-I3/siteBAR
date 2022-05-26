<?php

require_once('../../../config.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DatabaseModel/connect.php';
require('../../Layouts/navbar.php');

?>



<link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL']."/public/css/style.css"?>/>

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
    <div class="body-contact">
    <form>
        <h1>Contactez-nous</h1>
        <div class="separation"></div>
        <div class="corps-formulaire">
            <div class="gauche">
                <div class="groupe">
                    <label class="label">Votre Prénom</label>
                    <input type="text" autocomplete="off" />
                    <i class="fas fa-user"></i>
                </div>
                <div class="groupe">
                    <label class="label">Votre adresse e-mail</label>
                    <input type="text" autocomplete="off" />
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="groupe">
                    <label class="label">Votre téléphone</label>
                    <input type="text" autocomplete="off" />
                    <i class="fas fa-mobile"></i>
                </div>
            </div>

            <div class="droite">
                <div class="groupe">
                    <label class="label">Message</label>
                    <textarea placeholder="Saisissez ici..."></textarea>
                </div>
            </div>
        </div>

        <div class="pied-formulaire" align="center">
            <button>Envoyer le message</button>
        </div>
    </form>
    <div>
    </html>


<?php //require('../../Layouts/footer.php'); ?>
