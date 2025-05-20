<?php
require_once('../database/models/Customer.php');
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
    <h1 class="flex-center">Manage categories</h1>
    <?php 
        $categoryRepo = new CategoryRepository();
        $customerRepo = new CustomerRepository();
        
        $categories = $categoryRepo->getAll();
    ?>
    <div class="flex-center">
        <form action="AddCategory.php" method="post" class="p-20">
            <input placeholder="Name" type="text" name="name" class="p-10 light-border"/>
            <input placeholder="Description" type="text" name="description" class="p-10 light-border"/>
            <input placeholder="PictureUrl" type="text" name="pictureUrl" class="p-10 light-border"/>
            <button type="submit" class="blue-btn p-10">Krijo</submit>
        </form>
    </div>
    <div class="container d-flex column">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created on</th>
                <th>Updated on</th>
                <th>Updated by</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                if(isset($categories)){
                    foreach($categories as $category){
                        ?>
                        <tr>
                            <td><?php echo($category->id)?></td>
                            <td><?php echo($category->name)?></td>
                            <td><?php echo($category->description)?></td>
                            <td><?php echo($category->created_on)?></td>
                            <td><?php echo($category->updated_on)?></td>
                            <td>
                                <?php 
                                    if($category->updated_by!=null){
                                        echo($customerRepo->getEmailById($category->updated_by));
                                    }
                                ?>
                            </td>
                            <td><a class="link-button" href="DeleteCategory.php?id=<?php echo($category->id)?>">Fshij</a></td>
                            <td><a class="link-button" href="UpdateCategory.php?id=<?php echo($category->id)?>">Update</a></td>
                        </tr>
                    <?php
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>