<!-- on initialise notre base de données -->


<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">

    </head>
    <body>
        
        <?php
            $servernameBDD = 'localhost';
            $usernameBDD = 'root';
            $passwordBDD = 'root';
            $BDDname = 'Projet-WEB-I3-SHOP';
            global $conn;

            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servernameBDD;dbname=$BDDname;charset=utf8", $usernameBDD, $passwordBDD);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';

            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
             	echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>