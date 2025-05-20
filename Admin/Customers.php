<?php
require_once('../database/models/Customer.php');
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
    <h1 class="flex-center">Manage customers</h1>
    <?php 
        $customerRepo = new CustomerRepository();
        $customers = $customerRepo->getAll();
    ?>
    <div class="container d-flex column">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Phone number</th>
                <th>Gender</th>
                <th>Created on</th>
                <th>Updated on</th>
                <th></th>
                <th></th>
            </tr>
        <?php
            if(isset($customers)){
                foreach($customers as $customer){
                    ?>
                    <tr>
                        <td><?php echo($customer->id)?></td>
                        <td><?php echo($customer->name)?></td>
                        <td><?php echo($customer->surname)?></td>
                        <td><?php echo($customer->email)?></td>
                        <td><?php echo($customer->role)?></td>
                        <td><?php echo($customer->phone)?></td>
                        <td><?php echo($customer->gender)?></td>
                        <td><?php echo($customer->created_on)?></td>
                        <td><?php echo($customer->updated_on)?></td>
                        <td>
                        <?php
                            if(!$customerRepo->customerHasOrders($customer->id)){
                                ?>
                                <div><a class="link-button" href="DeleteCustomer.php?id=<?php echo($customer->id)?>">Fshij</a></div>
                                <?php
                            }
                        ?>
                        </td>
                        <td>
                        <?php
                            if($customer->role!='admin'){
                                ?>
                                <div><a class="link-button" href="UpdateAdmin.php?id=<?php echo($customer->id)?>">Update Admin</a></div>
                                <?php
                            }
                        ?>
                        </td>
                    </tr>
                <?php
                }
            }
        ?>
        </table>
    </div>
</body>
</html>