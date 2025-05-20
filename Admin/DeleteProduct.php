<?php
require_once('../database/models/Customer.php');
require_once('../database/ProductRepository.php');

session_start();

if(isset($_SESSION["customer"])){
    $user = $_SESSION["customer"];

    if($user->role=='admin'){
        $id = $_GET["id"];
        $productRepo = new ProductRepository();
        $productRepo->deleteProduct($id);

        header("Location: Products.php");
    }
}

header("Location: ../index.php");
?>