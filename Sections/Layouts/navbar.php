<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous"></script>


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
                <li class="item primary_animation"><a href="#">PRODUITS</a></li>
                <li class="item primary_animation"><a href="#">BONS PLANS</a></li>
                <li class="item primary_animation"><a href="#">PANIER</a></li>
                <li class="item primary_animation"><a href="#">CONTACT</a></li>



        <?php


        $id = 1;


        if ($id == 1) {
            ?>

            <li class="item button"><a class="text-font over_size-connexion" href=#>Connexion</a></li>
            <!--<li class="item button secondary"><a href="#">Profil</a></li>-->
            <li class="toggle"><span class="bars"></span></li>

            <?php
        } else {
            ?>

            <li class="item button color text button"><a href="#">Connexion</a></li>
            <li class="item button secondary"><a href="#">Inscription</a></li>
            <li class="toggle"><span class="bars"></span></li>

            <?php
        }

        ?>


        </ul>
    </nav>
</header>
