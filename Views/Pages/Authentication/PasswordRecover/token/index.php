<?php
require_once('../../../../../config.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Récuperation mot de passe</title>
    <link rel="stylesheet" type="text/css" href=
    <?php
    echo $URL."/public/css/style.css";
    ?>
    />

</head>



<body class="body-espaceco">



<div class="center">



    <h1 >Connexion</h1>

    <form method="POST" action="">



        <div class="txt_field">
            <input type="email" name="mail" required>
            <span></span>
            <label for="mail">Votre nouveau mot de passe</label>
        </div>

        <input type="submit" style="margin-bottom: 20px" value="Changer" name="mailbtn">



    </form>


</div>



</body>
</html>
