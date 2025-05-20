<?php
require_once('database/models/Customer.php');
require_once('database/CategoryRepository.php');
session_start();
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
<?php 
require("Header.php")
?>

    <section class="products" id="products">
        <?php
            $category = new CategoryRepository();
            $allCategories = $category->getAll();
        ?>
        <div class="box-container" style="margin-top:100px;">
            <?php
                if(isset($allCategories)){
                    foreach($allCategories as $categoryItem){
                        ?>
                        <a href="Products.php?category=<?php echo($categoryItem->id)?>" class="box">
                            <div class="box">
                                <span class="discount"></span>
                                <div class="image">
                                    <img src="<?php echo($categoryItem->pictureUrl)?>" alt="">
                                </div>
                                <div class="content">
                                    <h3><?php echo($categoryItem->name)?></h3>
                                    <div class="price"><span></span> </div>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>