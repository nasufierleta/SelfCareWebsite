<?php
require_once('../database/models/Customer.php');
require_once('../database/OrderRepository.php');
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
    <h1 class="flex-center">Manage orders</h1>
    <?php 
        $orderRepo = new OrderRepository();
        $customerRepo = new CustomerRepository();

        $orders = $orderRepo->getAll();
    ?>
    <div class="container d-flex column">
        <table>
            <tr>
                <th>Id</th>
                <th>Customer</th>
                <th>Delivery address</th>
                <th>Total price</th>
                <th>Payment status</th>
                <th>Created on</th>
                <th>Updated on</th>
                <th>Updated by</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                if(isset($orders)){
                    foreach($orders as $order){
                        ?>
                        <tr>
                            <td><?php echo($order->id)?></td>
                            <td>
                                <?php
                                    $customer = $customerRepo->getEmailById($order->customerId);
                                    echo($customer);
                                ?>
                            </td>
                            <td><?php echo($order->deliveryAddress)?></td>
                            <td><?php echo($order->totalPrice)?> €</td>
                            <td>
                                <?php
                                    $status = $order->isPaid;

                                    if($status==true){
                                        echo("Paid");
                                    }
                                    else{
                                        echo("Not paid");
                                    }
                                    
                                ?>
                            </td>
                            <td><?php echo($order->created_on)?></td>
                            <td><?php echo($order->updated_on)?></td>
                            <td><?php echo($order->updated_by)?></td>
                            <td><a class="link-button" href="OrderDetails.php?id=<?php echo($order->id)?>">Details</a></td>
                        </tr>
                    <?php
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>