<?php
session_start();

if(isset($_SESSION["customer"])){
    unset($_SESSION["customer"]);
    unset($_SESSION["cart"]);
}

header("Location: index.php");
?>