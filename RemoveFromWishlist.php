<?php
require_once('database/models/Customer.php');
require_once('database/WishlistRepository.php');

session_start();

if(!isset($_SESSION["customer"])){
    header('Location: index.php');
}

if(isset($_GET["productId"])){
    $wishlistRepo = new WishlistRepository();

    $customerId = $_SESSION["customer"]->id;
    $productId = $_GET["productId"];

    $wishlistRepo->removeFromWishlist($customerId,$productId);
    
    ?>
        <script>history.go(-1)</script>
    <?php
}
?>