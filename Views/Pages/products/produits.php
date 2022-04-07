<!-- produitBiere section starts  -->

<?php 
$imageUrlProduits = "../img/";
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
$image = '<img src="https://i.ibb.co/Zf8nswZ/chouffe.png" alt="">';
$name = '<h3>Chouffe</h3>';
$price = '<span>2.5</span>';
?>
<!--
<a href='https://ibb.co/9pTFXfM"><img src="https://i.ibb.co/Zf8nswZ/chouffe.png" alt="chouffe" border="0"></a>
<a href="https://ibb.co/7CPn4fx"><img src="https://i.ibb.co/c306LBK/CT.png" alt="CT" border="0"></a>
<a href="https://ibb.co/gmjXwXw"><img src="https://i.ibb.co/WGxdFdF/licorne.png" alt="licorne" border="0"></a>
<a href="https://ibb.co/HLZMGvQ"><img src="https://i.ibb.co/vC9rL58/paixdieu.png" alt="paixdieu" border="0"></a>
<a href="https://ibb.co/QFn8Dfc"><img src="https://i.ibb.co/5WvYK69/triplek.png" alt="triplek" border="0"></a>
<a href="https://ibb.co/Ssvnzz7"><img src="https://i.ibb.co/PmChddz/vedett.png" alt="vedett" border="0"></a>
-->

<link rel="stylesheet" type="text/css" href="../../CSS-Global/CSS/style.css">
<!-- <section class="produitBiere" id="produitBiere">
 -->
<div class="produitBiere">
    

    <!-- <h3 class="sub-heading"> NOS BIERE </h3> -->
    <!-- <h1 class="heading"> popular produitBiere </h1> -->

    <div class="box-container">
        <?php
        for ($i=0; $i<7; $i++) {
            echo $before_image;
            echo $image;
            echo $name;
            echo $stars;
            echo $price;
            echo $after_price;
        }
         ?>


        <!--
                <div class="box">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <img src="https://i.ibb.co/Zf8nswZ/chouffe.png" alt="">
                    <h3>Chouffe</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span>2.5</span>
                    <a href="#" class="btnPRODUCT">Ajouter au panier</a>
                </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="<?php echo $imageUrlProduits?>paixdieu.png" alt="">
            <h3>Paix Dieu</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <span>3€</span>
            <a href="#" class="btnPRODUCT">Ajouter au panier</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="<?php echo $imageUrlProduits?>triplek.png" alt="">
            <h3>Triple K</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>3€</span>
            <a href="#" class="btnPRODUCT">Ajouter au panier</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="<?php echo $imageUrlProduits?>vedett.png" alt="">
            <h3>Vedett</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>2€</span>
            <a href="#" class="btnPRODUCT">Ajouter au panier</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="<?php echo $imageUrlProduits?>CT.png" alt="">
            <h3>Cuvée des trolls</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>2.5€</span>
            <a href="#" class="btnPRODUCT">Ajouter au panier</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="<?php echo $imageUrlProduits?>licorne.png" alt="">
            <h3>Licorne</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>2.5€</span>
            <a href="#" class="btnPRODUCT">Ajouter au panier</a>
        </div>
-->
    </div>


</div>
<!-- </section> -->

<!-- produitBiere section ends -->