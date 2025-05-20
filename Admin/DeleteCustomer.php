<?php
require_once('../database/models/Customer.php');
require_once('../database/CustomerRepository.php');

session_start();

if(isset($_SESSION["customer"])){
    $user = $_SESSION["customer"];

    if($user->role=='admin'){
        $id = $_GET["id"];
        $categoryRepo = new CustomerRepository();
        $categoryRepo->deleteCustomer($id);

        header("Location: Customers.php");
    }
}

?>
        <script>history.go(-1)</script>
    <?php
?>