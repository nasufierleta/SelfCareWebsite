<?php
require_once('../database/models/Customer.php');
require_once('../database/ProductRepository.php');
require_once('../database/CategoryRepository.php');
require_once('../database/CustomerRepository.php');

session_start();

if(!isset($_SESSION["customer"]) || $_SESSION["customer"]->role!='admin'){
    header('Location: ../index.php');
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
    <h1 class="flex-center">Manage products</h1>
    <?php 
        $categoryRepo = new CategoryRepository();
        $customerRepo = new CustomerRepository();
        $categories = $categoryRepo->getAll();
    ?>
    <div class="m-20 flex-center">
        <form action="AddProduct.php" method="post" class="p-20">
            <input placeholder="Title" type="text" name="title" class="p-10 light-border"/>
            <input placeholder="Description" type="text" name="description" class="p-10 light-border"/>
            <select name="categoryId" class="p-10 light-border">
            <?php
                if(isset($categories)){
                    foreach($categories as $category){
                        ?>
                        <option value="<?php echo($category->id)?>"><?php echo($category->name)?></option>
                        <?php
                    }
                }
            ?>
            </select>
            <input placeholder="Price" type="number" name="price" class="p-10 light-border"/>
            <input placeholder="Stock" type="number" name="stock" class="p-10 light-border"/>
            <input placeholder="PictureUrl" type="text" name="pictureUrl" class="p-10 light-border"/>
            <button type="submit" class="p-10 blue-btn">Krijo</submit>
        </form>
    </div>
    <div class="container d-flex column">
        <table class="text-center">
            <tr>
                <th>Picture</th>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Created on</th>
                <th>Updated on</th>
                <th>Updated by</th>
                <th></th>
                <th></th>
            </tr>
        <?php 
            $productRepo = new ProductRepository();
            $products = $productRepo->getAll();

            if(isset($products)){
                foreach($products as $product){
                    ?>
                    <tr>
                        <td><img src="<?php echo($product->pictureUrl)?>"></td>
                        <td><?php echo($product->id)?></td>
                        <td><?php echo($product->title)?></td>
                        <td><?php echo($product->description)?></td>
                        <td><?php echo($product->price)?></td>
                        <td><?php echo($product->stock)?></td>
                        <td><?php echo($product->created_on)?></td>
                        <td><?php echo($product->updated_on)?></td>
                        <td class="center-align">
                            <?php
                                if($product->updated_by!=null){
                                    echo($customerRepo->getEmailById($product->updated_by));
                                }
                            ?>
                        </td>
                        <td><a class="link-button" href="DeleteProduct.php?id=<?php echo($product->id)?>">Fshij</a></td>
                        <td><a class="link-button" href="UpdateProduct.php?id=<?php echo($product->id)?>">Update</a></td>
                    </tr>
                <?php
                }
            }
        ?>
        </table>
    </div>
</body>
</html>