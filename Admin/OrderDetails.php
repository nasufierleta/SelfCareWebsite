<?php
require_once('../database/models/Customer.php');
require_once('../database/OrderRepository.php');
require_once('../database/CustomerRepository.php');

session_start();

if(!isset($_SESSION["customer"]) || $_SESSION["customer"]->role!='admin'){
    header('Location: ../index.php');
}

$orderRepo = new OrderRepository();
$customerRepo = new CustomerRepository();

if(isset($_GET["id"])){
    $id=$_GET["id"];

    $order = $orderRepo->getOrderById($id);
    $customer = $customerRepo->getCustomerById($order->customerId);
    $products = $orderRepo->getProductsByOrderId($id);
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
    <div class="flex-center column">
        <div class="d-flex column m-20 w-50 p-20 bg-light light-border">
            <h1>Order details</h1>
            <div class="top-10">
                <span class="p-10 label-text">Customer: </span>
                <div>
                    <span class="p-10"><?php echo($customer[0]." ".$customer[1]." - ".$customer[2]);?></span>
                </div>
            </div>
            <div class="top-10">
                <span class="p-10 label-text">Delivery address:</span>
                <div>
                    <span class="p-10"><?php echo($order->deliveryAddress)?></span>
                </div>
            </div>
            <div class="top-10">
                <span class="p-10 label-text">Total price:</span>
                <div>
                    <span class="p-10"><?php echo($order->totalPrice)?> €</span>
                </div>
            </div>
            <div class="top-20">
                <?php
                    if($order->isPaid){
                        ?>
                        <span class="p-10 paid-label light-border">Has been paid!</span>
                    <?php
                    } 
                    else{
                        ?>
                        <span class="p-10 unpaid-label light-border">Has not been paid!</span>
                    <?php
                    }
                ?>
            </div>
        </div>
        <div id="products-container" class="d-flex w-50 p-20 light-blue-bg light-border">
            <table>
                <tr>
                    <th>Product id</th>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <?php
                    if(isset($products)){
                        foreach($products as $product){
                            ?>
                            <tr>
                                <td><?php echo($product->id)?></td>
                                <td><img src="<?php echo($product->pictureUrl)?>" alt="<?php echo($product->title)?>"></td>
                                <td><?php echo($product->title)?></td>
                                <td><?php echo($product->price)?></td>
                                <td><?php echo($product->quantity)?></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>