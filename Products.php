<?php
require_once('database/ProductRepository.php');
require_once('database/CategoryRepository.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="categories.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php require("Header.php")?>
    <section class="products" id="products" style="margin-top:50px;">
        <?php
            $productRepo = new ProductRepository();
            $categoryRepo = new CategoryRepository();
            $categoryId=$_GET['category'];

            $allProducts = $productRepo->getProductsForCategory($categoryId);
            $category = $categoryRepo->getById($categoryId);
        ?>    
        <h1 class="heading"><?php echo($category->name)?></h1>
        <div class="box-container">
            <?php
                if(isset($allProducts)){
                    foreach($allProducts as $productItem){
                        ?>
                            <div class="box">
                                <span class="discount"></span>
                                <div class="image">
                                    <img src="<?php echo($productItem->pictureUrl)?>" alt="<?php echo($productItem->title)?>">
                                    <div class="icons">
                                        <a href="addToWishlist.php?productId=<?php echo($productItem->id)?>" class="fas fa-heart"></a>
                                        <a href="
                                        <?php
                                            if($productItem->stock>0){
                                                echo("addToCart.php?id=$productItem->id");
                                            }
                                            else{
                                                echo("#");
                                            }
                                        ?>" class="cart-btn">
                                        <?php
                                            if($productItem->stock>0){
                                                echo("add to cart");
                                            }
                                            else{
                                                echo("no stock");
                                            }
                                        ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="ProductDetails.php?id=<?php echo($productItem->id)?>"><?php echo($productItem->title)?></a></h3>
                                    <div class="price"><?php echo($productItem->price)?> €<span></span> </div>
                                </div>
                            </div>
                    <?php
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>