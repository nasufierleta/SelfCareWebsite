<?php
require_once('../database/models/Customer.php');
require_once('../database/ProductRepository.php');

session_start();

if(!isset($_SESSION["customer"]) || $_SESSION["customer"]->role!='admin'){
    header('Location: ../index.php');
}

$productRepo = new ProductRepository();

if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock"]) && isset($_POST["pictureUrl"])){
    $productId = $_POST["productid"];
    $title=$_POST["title"];
    $description=$_POST["description"];
    $price=$_POST["price"];
    $stock=$_POST["stock"];
    $pictureUrl=$_POST["pictureUrl"];
    
    $productRepo->updateProduct($productId,$title,$description,$price,$stock,$pictureUrl,null);

    header("Location: Products.php");
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
    <h1>Update product</h1>
    <?php 
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $product = $productRepo->getById($id);
            ?>
            <div>
            <?php
            if($product!=null){
                ?>
                <form action="UpdateProduct.php" method="post">
                    <input placeholder="Id" type="number" name="productid" value="<?php echo($product->id)?>" hidden/>
                    <input placeholder="Title" type="text" name="title" value="<?php echo($product->title)?>"/>
                    <input placeholder="Description" type="text" name="description" value="<?php echo($product->description)?>"/>
                    <input placeholder="Price" type="number" name="price" value="<?php echo($product->price)?>"/>
                    <input placeholder="Stock" type="number" name="stock" value="<?php echo($product->stock)?>"/>
                    <input placeholder="PictureUrl" type="text" name="pictureUrl" value="<?php echo($product->pictureUrl)?>"/>
                    <button type="submit">Update</submit>
                </form>
                <?php
            }?>
        </div>
        <?php
        }
        ?>
</body>
</html>