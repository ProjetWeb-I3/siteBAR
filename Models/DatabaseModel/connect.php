<!-- on initialise notre base de données -->


<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">

    </head>
    <body>

        <?php
            $servernameBDD = '145.14.151.101';
            $usernameBDD = 'u556968436_TeamWebsiteBar';
            $passwordBDD = 'TeamWebsiteBar2022';
            $BDDname = 'u556968436_siteBAR';
            global $conn;

            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servernameBDD;dbname=$BDDname;charset=utf8", $usernameBDD, $passwordBDD);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
                echo dirname(__DIR__);
                echo $GLOBALS['URL'];

            }

            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
             	echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
