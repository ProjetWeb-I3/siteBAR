
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>



    <script>
        $(function() {
            $(".toggle").on("click", function() {
                if ($(".item").hasClass("active")) {
                    $(".item").removeClass("active");
                } else {
                    $(".item").addClass("active");
                }
            });
        });
    </script>

    
<header class="header" id="header">
	

    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">BAR ICAM TOULOUSE</a></li>
            <li class="item"><a href="#">Acceuil</a></li>
            <li class="item"><a href="#">Produits</a></li>
            <li class="item"><a href="#">Bon Plans</a></li>
            <li class="item"><a href="#">Panier</a></li>
            <li class="item"><a href="#">Contact</a></li>
            </li>





            <?php
            

                $id=0;
           

                if ($id==1)
                {
            ?>

                <li class="item button"><a href="#">Deconnexion</a></li>
                <li class="item button secondary"><a href="#">Profil</a></li>
                <li class="toggle"><span class="bars"></span></li>

            <?php   
                }
                else
                {
            ?>

                <li class="item button"><a href="Sections/Pages/Profile/espaceCo/login.php">Connexion</a></li>
                <li class="item button secondary"><a href="Sections/Pages/Profile/espaceCo/Register.php">Inscription</a></li>
                <li class="toggle"><span class="bars"></span></li>

            <?php
                }
            
            ?>


        </ul>
    </nav>
</header>
