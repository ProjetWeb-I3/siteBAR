<?php
require_once '../DatabaseModel/connect.php';
require_once '../../Controllers/AdminControllers/ProductController/getProduct.php';
global $conn;
$info_articles = displayProduct($conn);
print($info_articles);
?>