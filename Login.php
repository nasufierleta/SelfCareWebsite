<?php
session_start();
require_once('database/CustomerRepository.php');

$customerRepo = new CustomerRepository();

if(isset($_POST["email"]) && isset($_POST["password"])){
    //check for login
    $loggedInCustomer = $customerRepo->loginUser($_POST["email"],$_POST["password"]);

    if($loggedInCustomer==null){
        header("Location: index.php#?alert=invalid");
    }
    else{
        $_SESSION["customer"]=$loggedInCustomer;
        header("Location: index.php");
    }
}
?>