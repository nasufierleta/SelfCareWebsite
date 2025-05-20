<?php
require_once('../database/models/Customer.php');
session_start();

if(!isset($_SESSION["customer"]) || $_SESSION["customer"]->role!='admin'){
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin-style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
</head>
<body>
    <h1 class="flex-center">Oceanica Admin</h1>
    <div class="d-flex column">
        <div class="d-flex row">
            <a class="light-blue-bg h-500 w-50 flex-center m-20" href="products.php">
                <span class="dashboard-text">Products</span>
            </a>
            <a href="categories.php" class="light-blue-bg h-500 w-50 flex-center m-20">
                <span class="dashboard-text">Categories</span>
            </a>
        </div>
        <div class="d-flex row">
            <a href="customers.php" class="light-blue-bg h-500 w-50 flex-center m-20">
                <span class="dashboard-text">Customers</span>
            </a>
            <a href="orders.php" class="light-blue-bg h-500 w-50 flex-center m-20">
                <span class="dashboard-text">Orders</span>
            </a>
        </div>
    </div>
</body>
</html>