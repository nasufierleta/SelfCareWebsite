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
    $id = $_GET["id"];
    $products = $_SESSION["cart"];

    foreach($products as $product){
        if($product->id==$id){
            $key = array_search($product, $products);
            unset($_SESSION["cart"][$key]);
        }
    }

    ?>
        <script>history.go(-1)</script>
    <?php
}
?>