<?php
require_once('database/models/Customer.php');
require_once('database/OrderRepository.php');

session_start();

if(!isset($_SESSION["customer"]) || !isset($_SESSION["cart"])){
    header('Location: index.php');
}

if(isset($_POST["address"])){
    header('Location: index.php');
}

$customer = $_SESSION["customer"];
$products = $_SESSION["cart"];
$address = $_POST["address"];

var_dump($customer);
var_dump($products);
var_dump($address);

$orderRepo = new OrderRepository();
$orderRepo->addOrder($customer->id,$address,$products);

header('Location: wishlist.php');
?>