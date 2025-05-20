<?php
require_once('../database/models/Customer.php');
require_once('../database/CategoryRepository.php');

session_start();

if(isset($_SESSION["customer"])){
    $user = $_SESSION["customer"];

    if($user->role=='admin'){
        $categoryRepository = new CategoryRepository();

        $name=$_POST["name"];
        $description=$_POST["description"];
        $pictureUrl=$_POST["pictureUrl"];

        $categoryRepository->addCategory($name,$description,$pictureUrl,$user->id);

        header("Location: Categories.php");
    }
}

header("Location: ../index.php");

?>