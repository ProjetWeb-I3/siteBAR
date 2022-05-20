<?php
require_once('../../../config.php');
require('../../Layouts/navbar.php');

?>
<div>
    <link rel="stylesheet" type="text/css" href=<?php echo $GLOBALS['URL'] . "/public/css/style.css" ?>/>
    <div>
        <h1 class="padding-top h1 "> Nos bons plans ! </h1>

        <p class="p h2 "> Venez dès à présent visiter les lieux que nous avons sélectionnés pour vous !</p>

        <div class="padding">
            <div class="box-container2 flex-direction-row">
                <div class="test">
                    <img class="resize-img box1 block-img"
                         src="https://vandb.fr/Assets/166069/Theme/Project/Vandb/img/logo-share.png"
                         alt=" ">
                </div>
                <p class="p box2">La boutique V&B de purpan est l'un de nos meilleurs bons plans, située tout près de
                    l'ICAM, certains la
                    reconnaîtront sûrement. De nombreuses bières y sont proposées dans un cadre chaleureux et bon
                    enfant.
                    De plus, il proposent également certains des meilleurs vins du sud-ouest pour le plaisir de vos
                    papilles
                    !
                    En tout cas nous on adore !</p>

            </div>
        </div>

        <div class="padding">
            <div class="box-container2 flex-direction-row">
                <img class="resize-img-secondary box1" src="https://www.3brasseurs.com/medias/images/upload/plats/plat_5.jpg"
                     alt=" ">
                <p class="p box2">Dans un tout autre style, les 3 Brasseurs de Labège proposent le charme d'un bistrot
                    couplé à de délicieuses bières artisanales de la région. A essayer immédiatement !</p>


            </div>
        </div>
    </div>
    <?php require('../../Layouts/footer.php'); ?>
