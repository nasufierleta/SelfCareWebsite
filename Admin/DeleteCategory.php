<?php
require_once('../database/models/Customer.php');
require_once('../database/CategoryRepository.php');

session_start();

if(isset($_SESSION["customer"])){
    $user = $_SESSION["customer"];

    if($user->role=='admin'){
        $id = $_GET["id"];
        $categoryRepo = new CategoryRepository();
        $categoryRepo->deleteCategory($id);

        header("Location: Categories.php");
    }
}

header("Location: ../index.php");
?>