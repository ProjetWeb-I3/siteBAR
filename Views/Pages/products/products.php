<?php

require '/var/www/DEV/toulouse/i3m4/web/LASSERRE_LEBOULCH_GAUTHEREAU_LARCHER' . '/Models/DatabaseModel/connect.php';
require_once('../../../config.php');



require('../../Layouts/navbar.php');
?>


<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['URL_CSS'] . "/public/css/style.css" ?>"/>
<!--<section class="produitBiere" id="produitBiere">-->

<div class="produitBiere">
    <div class="margin-top-product">
        <h1 class="title"> Nos produits sont disponibles !</h1>

        <!-- <h3 class="sub-heading"> NOS BIERE </h3> -->
        <!-- <h1 class="heading"> popular produitBiere </h1> -->

        <div class="box-container">

            <?php

            require_once '../../../Models/DatabaseModel/connect.php';
            require_once '../../../Controllers/AdminControllers/ProductController/getProduct.php';
            global $conn;
            //
            $req = $conn->query('SELECT * FROM products ');
            $article = $req->fetchALL();
            foreach ($article as $articles): ?>
                <div class="box">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <img src="../../Admin/ProductManager/imgProductsBar/<?php echo $articles['image_products'] ; ?>" >
                    <h3><?php echo $articles["name_products"]; ?></h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="price"> <?php echo $articles["price_products"]; ?> €</span>

                    <?php

                        if (isset($_SESSION['id_users'])) { ?>

                                <a class="btnPRODUCT" href="../Cart/functionADDCart.php?refProductCart=<?=$articles["id_products"] ?>">Ajouter Panier</a>


                        <?php
                        }
                        else{ ?>

                            <a class="btnPRODUCT">Connectez vous !</a>

                        <?php


                        }


                    ?>

                </div>



            <?php endforeach ?>




        </div>


    </div>
</div>
<?php
require('../../Layouts/footer.php');
?>
<!-- </section> -->

<!-- produitBiere section ends -->
