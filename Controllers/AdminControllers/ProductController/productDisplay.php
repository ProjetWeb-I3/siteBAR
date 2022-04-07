<?php

function displayProduct($conn){
    $req_names = $conn->query('SELECT name_products FROM products WHERE visibility=1') ;
    $names = $req_names->fetchall();

    $req_prices = $conn->query('SELECT name_prices FROM products WHERE visibility=1') ;
    $prices = $req_prices->fetchall();
    return $names and $prices;
}

?>