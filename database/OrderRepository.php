<?php
require_once('Connection.php');
require_once('models/Order.php');
require_once('models/OrderProduct.php');
require_once('ProductRepository.php');

class OrderRepository{
    public function getAll(){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id,customer_id,delivery_address,total_price,is_paid,created_on,updated_on,updated_by FROM user_orders";
        $query = $connection->prepare($sql);
        $query->execute();

        $orders = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $order = new Order($row["id"],$row["customer_id"],$row["delivery_address"],$row["total_price"],$row["is_paid"],$row["created_on"],$row["updated_on"],$row["updated_by"]);
            $orders[] = $order;
        }

        return $orders;
    }

    public function getOrderById($id){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id,customer_id,delivery_address,total_price,is_paid,created_on,updated_on,updated_by FROM user_orders WHERE id=$id";
        $query = $connection->prepare($sql);
        $query->execute();

        $result = $query->fetch();

        if($result==null){
            return null;
        }

        $order = new Order($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7]);
        return $order;
    }

    public function getProductsByOrderId($id){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT products.id,title,price,quantity,picture_url FROM products INNER JOIN order_products ON products.id=order_products.product_id WHERE order_products.order_id=$id";
        $query = $connection->prepare($sql);
        $query->execute();

        $products = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $product = new OrderProduct($row["id"],$row["title"],$row["price"],$row["quantity"],$row["picture_url"]);

            $products[]=$product;
        }

        return $products;
    }

    public function addOrder($customerId, $address, $products){
        $database = new DbConnection();
        $connection = $database->getConnection();
        
        $total = 0;
        foreach($products as $product){
            $total = $total + ($product->price*$product->quantity);
        }

        $sql = "INSERT INTO user_orders(customer_id,total_price,is_paid,delivery_address,created_on) VALUES(?,?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$customerId, $total, false, $address, date('Y-m-d H:i:s')]);

        $orderId = $connection->lastInsertId();

        foreach($products as $product){
            $sql = "INSERT INTO order_products(order_id,product_id,quantity) VALUES(?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$orderId,$product->id,$product->quantity]);

            $this->reduceStockForProduct($connection,$product->id,$customerId);
        }
    }

    public function reduceStockForProduct($connection,$productId,$customerId){
        $productRepo = new ProductRepository();
        $product = $productRepo->getById($productId);

        $stock = $product->stock-1;

        $sql = "UPDATE products SET stock=?, updated_on=?, updated_by=? WHERE id=?";
        $stmt= $connection->prepare($sql);
        $stmt->execute([$stock,date('Y-m-d H:i:s'),$customerId,$productId]);
    }
}
?>