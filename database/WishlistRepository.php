<?php
require_once('ProductRepository.php');

class WishlistRepository{
    public function getWishlistForCustomerId($customerId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT products.id,title,picture_url,price FROM products INNER JOIN wishlist ON products.id=wishlist.product_id WHERE wishlist.customer_id=$customerId";
        $query = $connection->prepare($sql);
        $query->execute();

        $products = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $product = new Product($row["id"],$row["title"],null,$row["price"],null,$row["picture_url"],null,null,null);

            $products[]=$product;
        }

        return $products;
    }

    public function addToWishlist($customerId,$productId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $checkSql = "SELECT id FROM wishlist WHERE customer_id=$customerId AND product_id=$productId";
        $query = $connection->prepare($checkSql);
        $query->execute();

        $result = $query->fetch();

        if($result==null){
            $sql = "INSERT INTO wishlist(customer_id, product_id, created_on) VALUES (?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$customerId, $productId, date('Y-m-d H:i:s')]);
        }
    }

    public function removeFromWishlist($customerId, $productId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $wishlistDeleteSql = "DELETE FROM wishlist WHERE product_id=? AND customer_id=?";
        $stmt = $connection->prepare($wishlistDeleteSql);
        $stmt->execute([$productId,$customerId]);
    }
}
?>