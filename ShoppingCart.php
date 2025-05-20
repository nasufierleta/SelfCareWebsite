<?php
require_once('database/models/Customer.php');
require_once('database/models/OrderProduct.php');

session_start();

if(!isset($_SESSION["cart"])){
    ?>
    <script>history.go(-1)</script>
    <?php
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
     <link rel="stylesheet" href="ShoppingCart.css" />
     <!-- font awesome cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     
</head>
<body>
    <?php 
        require('Header.php');
    ?>

    <section id="cart-container" class="container">
        <div class="table">
            <table class="produktet">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Produkti</th>
                        <th>Cmimi</th>
                        <th>Sasia</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_SESSION["cart"])){
                            $products = $_SESSION["cart"];
                            $totali = 0;

                            foreach($products as $product){
                                $totali = $totali + ($product->price*$product->quantity);
                                ?>
                                    <tr>
                                        <td><img class="cart-product-img" src="<?php echo($product->pictureUrl)?>"></td>
                                        <td><?php echo($product->title)?></td>
                                        <td><?php echo($product->price)?> €</td>
                                        <td><?php echo($product->quantity)?></td>
                                        <th><a class="remove-btn" href="removeFromCart.php?id=<?php echo($product->id)?>">Remove</a></th>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="info">
            <div class="totali">
                <h2>Totali:</h2>
                <span><?php echo($totali)?> €</span>
            </div>
            <div class="totali">
                <form method="post" action="AddOrder.php">
                    <h2>Adresa:</h2>
                    <input type="text" name="address" class="box" id="textid">
                    <input type="submit" value="Order" class="btn">
                </form>
            </div>
        </div>
    </section>
</body>
</html>