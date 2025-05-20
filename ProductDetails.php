<?php
require_once('database/ProductRepository.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="ProductDetails.css">
</head>
<body>
<?php 
require("Header.php");

$productRepo = new ProductRepository();
$productId=$_GET['id'];

$product = $productRepo->getById($productId);
?>
    <div class = "main-wrapper">
        <div class = "container">
            <div class = "product-div">
                <div class = "product-div-left">
                    <div class = "img-container">
                        <img src = "<?php echo($product->pictureUrl)?>" alt = "watch">
                    </div>
                </div>
                <div class = "product-div-right">
                    <span class = "product-name"><?php echo($product->title)?></span>
                    <span class = "product-price"><?php echo($product->price)?> €</span>
                    <div class = "product-rating">
                        <!-- <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star-half-alt"></i></span>
                        <span>(350 ratings)</span> -->
                        <span><?php echo($product->stock)?> left in stock</span>
                    </div>
                    <p class = "product-description"><?php echo($product->description)?></p>
                    <div class = "btn-groups">
                        <a href="
                        <?php
                            if($product->stock>0){
                                echo("addToCart.php?id=$product->id");
                            }
                            else{
                                echo("#");
                            }
                        ?>
                        " class = "add-cart-btn"><i class = "fas fa-shopping-cart"></i>
                            <?php
                                if($product->stock>0){
                                    echo("add to cart");
                                }
                                else{
                                    echo("no stock");
                                }
                            ?>
                            </a>
                        <button type = "button" class = "buy-now-btn" onclick="redirectToShoppingCart()"><i class = "fas fa-wallet"></i>buy now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src = "script.js"></script>
</body>
</html>