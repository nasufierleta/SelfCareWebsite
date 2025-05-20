<?php
require_once('database/models/Customer.php');
require_once('database/models/OrderProduct.php');
require_once('database/ProductRepository.php');

session_start();

if(!isset($_SESSION["customer"])){
    header('Location: index.php');
}

$customer = $_SESSION["customer"];

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
}

if(isset($_GET["id"])){
    $productRepo = new ProductRepository();
    $id = $_GET["id"];

    $product = $productRepo->getById($id);

    $orderProduct = new OrderProduct($product->id,$product->title,$product->price,1,$product->pictureUrl);
    $_SESSION["cart"][] = $orderProduct;

    header('Location: shoppingCart.php');
}
?>