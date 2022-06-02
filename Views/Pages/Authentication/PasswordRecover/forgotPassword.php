<?php
require_once('../../../../config.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Récuperation mot de passe</title>
    <link rel="stylesheet" type="text/css" href=
    <?php echo $GLOBALS['URL_CSS']."/public/css/style.css"?>
    />

</head>

<?php

require('recoverFunction.php');
$recover = recoverPassword();

?>

<body class="body-espaceco">



<div class="center">



    <h1 >Connexion</h1>

    <form method="POST" action="">



        <div class="txt_field">
            <input type="email" name="mail" required>
            <span></span>
            <label for="mail">Email de Récuperation</label>
        </div>

        <input type="submit" style="margin-bottom: 20px" value="Envoyer un lien" name="mailbtn">



    </form>


</div>



</body>
</html>
