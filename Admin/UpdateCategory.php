<?php
require_once('../database/models/Customer.php');
require_once('../database/CategoryRepository.php');

session_start();

if(!isset($_SESSION["customer"]) || $_SESSION["customer"]->role!='admin'){
    header('Location: ../index.php');
}

$categoryRepo = new CategoryRepository();

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["pictureUrl"])){
    $productId = $_POST["productid"];
    $name=$_POST["name"];
    $description=$_POST["description"];
    $pictureUrl=$_POST["pictureUrl"];

    $categoryRepo->updateCategory($productId,$name,$description,$pictureUrl,null);

    header("Location: Categories.php");
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
    <h1>Update category</h1>
    <?php 
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $category = $categoryRepo->getById($id);
            ?>
            <div>
            <?php
            if($category!=null){
                ?>
                <form action="UpdateCategory.php" method="post">
                    <input placeholder="Id" type="number" name="productid" value="<?php echo($category->id)?>" hidden/>
                    <input placeholder="Name" type="text" name="name" value="<?php echo($category->name)?>"/>
                    <input placeholder="Description" type="text" name="description" value="<?php echo($category->description)?>"/>
                    <input placeholder="PictureUrl" type="text" name="pictureUrl" value="<?php echo($category->pictureUrl)?>"/>
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