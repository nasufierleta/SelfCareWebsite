<?php
require_once('../database/models/Customer.php');
require_once('../database/CustomerRepository.php');

session_start();

if(isset($_SESSION["customer"])){
    $user = $_SESSION["customer"];

    if($user->role=='admin'){
        $customerId = $_GET["id"];
        $customerRepo = new CustomerRepository();
        $customerRepo->udpdateToAdmin($customerId,null);

        header("Location: Customers.php");
    }
}

header("Location: ../index.php");
?>