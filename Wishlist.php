<?php
require_once('database/models/Customer.php');
require_once('database/WishlistRepository.php');

session_start();

if(!isset($_SESSION["customer"])){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
     <!---Custom CSS File--->
     <link rel="stylesheet" href="style.css" />
     <link rel="stylesheet" href="Wishlist.css" />
     <!-- font awesome cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     
</head>
<body>
    <?php 
        require('Header.php');

        $wishlistRepo = new WishlistRepository();

        if(isset($_SESSION["customer"])){
            $customer = $_SESSION["customer"];
            $products = $wishlistRepo->getWishlistForCustomerId($customer->id);
        }
    ?>
    <section class="container mt-50">
        <?php
            if(isset($products)){
                ?>
                <table class="w-100 wishlist-table">
                    <?php
                        foreach($products as $product){
                            ?>
                            <tr>
                                <td><img class="w-200" src="<?php echo($product->pictureUrl)?>" alt="<?php echo($product->title)?>"/></td>
                                <td><?php echo($product->title)?></td>
                                <td><?php echo($product->price)?> €</td>
                                <td><a href="removeFromWishlist.php?productId=<?php echo($product->id)?>">Remove</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
                <?php
            }
            else{
                ?>
                <h1 class="flex-container">Nothing on your wishlist yet!</h1>
                <?php
            }
        ?>
    </section>
</body>
</html>