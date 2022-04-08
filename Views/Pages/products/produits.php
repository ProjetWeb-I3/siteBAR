<!-- produitBiere section starts  -->

<?php

require_once('../../../config.php');

$before_image =
    '<div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>';
$stars =
    '<div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
    </div>';
$after_price =
    '<a href="#" class="btnPRODUCT">Ajouter au panier</a>
    </div>';
$image = '<img src="https://i.ibb.co/Zf8nswZ/chouffe.png" alt="">'; //changer le lien par une variable qui boucle sur la BDD
$name = '<h3>Chouffe</h3>';//changer le nom par une variable qui boucle sur la BDD
$price = '<span>2.5</span>'; //changer le prix par une variable qui boucle sur la BDD (données à récupérer avec getProduct.php et productInfo.php)
require('../../Layouts/navbar.php');
?>
<!--
<a href='https://ibb.co/9pTFXfM"><img src="https://i.ibb.co/Zf8nswZ/chouffe.png" alt="chouffe" border="0"></a>
<a href="https://ibb.co/7CPn4fx"><img src="https://i.ibb.co/c306LBK/CT.png" alt="CT" border="0"></a>
<a href="https://ibb.co/gmjXwXw"><img src="https://i.ibb.co/WGxdFdF/licorne.png" alt="licorne" border="0"></a>
<a href="https://ibb.co/HLZMGvQ"><img src="https://i.ibb.co/vC9rL58/paixdieu.png" alt="paixdieu" border="0"></a>
<a href="https://ibb.co/QFn8Dfc"><img src="https://i.ibb.co/5WvYK69/triplek.png" alt="triplek" border="0"></a>
<a href="https://ibb.co/Ssvnzz7"><img src="https://i.ibb.co/PmChddz/vedett.png" alt="vedett" border="0"></a>
-->

<link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL']."/public/css/style.css"?>/>
<!-- <section class="produitBiere" id="produitBiere">
 -->
<div class="produitBiere">


    <!-- <h3 class="sub-heading"> NOS BIERE </h3> -->
    <!-- <h1 class="heading"> popular produitBiere </h1> -->

    <div class="box-container">

        <?php

        require_once '../../../Models/DatabaseModel/connect.php';
        require_once '../../../Controllers/AdminControllers/ProductController/getProduct.php';
        global $conn;
//
        $req = $conn->query('SELECT * FROM products ');
        while($article = $req->fetch()){
            if($article['visibility'] == 1){
                echo $before_image;

                echo '<img src="';
                echo $article["image_products"];
                echo '" alt="">';

                echo '<h3>';
                echo $article["name_products"];
                echo '</h3>';

                echo $stars;

                echo '<span class="price">';
                echo $article["price_products"];
                echo '</span>';

                echo $after_price;
            }


        }
        ?>

        <?php/*
        for ($i=0; $i<7; $i++) {
            echo $before_image;
            echo $image;
            echo $name;
            echo $stars;
            echo $price;
            echo $after_price;
        }*/


         ?>
    </div>


</div>

<?php
require('../../Layouts/footer.php');
?>
<!-- </section> -->

<!-- produitBiere section ends -->
