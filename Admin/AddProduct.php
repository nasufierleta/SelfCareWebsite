<?php
require_once('../database/models/Customer.php');
require_once('../database/ProductRepository.php');

session_start();

if(isset($_SESSION["customer"])){
    $user = $_SESSION["customer"];

    if($user->role=='admin'){
        $productRepository = new ProductRepository();

        $title=$_POST["title"];
        $description=$_POST["description"];
        $price=$_POST["price"];
        $stock=$_POST["stock"];
        $pictureUrl=$_POST["pictureUrl"];
        $categoryId=$_POST["categoryId"];

        $productRepository->addProduct($title,$description,$price,$stock,$pictureUrl,$categoryId,$user->id);

        header("Location: Products.php");
    }
}

header("Location: ../index.php");
?>