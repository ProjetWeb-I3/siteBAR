<?php

session_start();

require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/config.php';

if (!$_SESSION['adminBAR']) {
    header('Location:' . $GLOBALS["URL"] . '/Views/Admin/login.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Mail</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['URL_CSS'] . "/public/css/style.css" ?>"/>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <script src="../tinymce/tinymce.min.js"></script>
</head>
<body class="admin-body product-manager">

<?php
//require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Views/Admin/Layouts/navbarAdmin.php';
require('../../../Controllers/AdminControllers/MailController/SendMail.php');
$SendMail = SendMailPHP();
?>

<div class="admin-wrapper">
    <!-- barre de gauche -->
    <?php
    require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Views/Admin/Layouts/leftNavbarAdmin.php'
    ?>

    <!-- contenu admin -->

    <div class="admin-content">



        <div class="content ">
            <h2 class="titre-page"> Gérer les mails</h2>

            <form method="POST" enctype="multipart/form-data" action="">
            <table class="product-managerFontsizetable">
                <thead>

                <th>Username</th>
                <th>Mail</th>
                <th colspan="3">Niveau</th>
                </thead>
                <tbody>

                <?php

                global $conn;
                require_once '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';

                $req = $conn->query('SELECT * FROM users');
                $user = $req->fetchALL();

                foreach ($user as $users): ?>



                    <tr>

                        <td><input type="checkbox" name="formMailAdress[]" value=" <?= $users['mail_users'] ?> " class="largerCheckbox"/>   <?= $users['username_users'] ?> </td>

                        <td><?= $users['mail_users'] ?> </td>
                        <td><?= $users['rank_users'] ?> </td>

                        <td>

                        </td>
                    </tr>

                <?php endforeach ?>



                </tbody>

            </table>
                </br>
                </br>
                </br>


                <textarea class="form-area" id="mod" name="Content"></textarea>

                <script>
                    tinymce.init({
                        selector:'#mod'
                    });
                </script>



               <button class="btnp"  name="formMail">Envoyer le mail</button>


                <div class="errorForm">
                    <h2>
                        <?php $Err = errorFormMail(); ?>
                    </h2>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
