<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="/public/css/style.css">

<script>
    $(function () {
        $(".toggle").on("click", function () {
            if ($(".item").hasClass("active")) {
                $(".item").removeClass("active");
                $("header").removeClass("bigger");

            } else {
                $(".item").addClass("active");
                $("header").addClass("bigger");
            }
        });
    });
</script>


<header class="header" id="header">


    <nav>

            <ul class="menu primary">
                <li class="logo over"><a class="text-font over" href="#">BAR ICAM TOULOUSE</a></li>
                <li class="item primary_animation"><a href="#">ACCUEIL</a></li>
                <li class="item primary_animation"><a href="../../Views/Pages/products/product.php">PRODUITS</a></li>
                <li class="item primary_animation"><a href="../../Views/Pages/Recommandation/recommandation.php">BONS PLANS</a></li>
                <li class="item primary_animation"><a href="../../Views/Pages/Cart/cart.php">PANIER</a></li>
                <li class="item primary_animation"><a href="../../Views/Pages/Contact/contact.php">CONTACT</a></li>


                <?php
                if(isset($_SESSION['id_user']) AND $_GET['id_user']>0)
                {
                    $getid =$_SESSION['id_user'];
                    $requser = $conn->prepare('SELECT * FROM Users WHERE id_user = ?');
                    $requser->execute(array($getid));
                    $userinfo = $requser->fetch();
                    ?>


                    <?php
                    if (isset($_SESSION['id_user']) AND $userinfo['id_user'] == $_SESSION['id_user'])
                    {
                        ?>

                        <li class="item button "><a class= "text-font over_size-connexion" href="../../Views/Pages/Authentication/logout.php">Deconnexion</a></li>
                        <li class="item button "><a class= "text-font over_size-connexion" href="#">Profil</a></li>
                        <!--                <li class="toggle"><span class="bars"></span></li>-->

                        <?php
                    }
                    ?>
                    <?php
                }
                else
                {
                    ?>

                    <li class="item button "><a class= "text-font over_size-connexion" href="../../Views/Pages/Authentication/login.php">Connexion</a></li>
                    <li class="item button "><a class= "text-font over_size-connexion" href="../../Views/Pages/Authentication/Register.php">Inscription</a></li>
                    <li class="toggle"><span class="bars"></span></li>

                    <?php
                }
                ?>

        </ul>
    </nav>
</header>
