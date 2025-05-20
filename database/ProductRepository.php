<?php
require_once('Connection.php');
require_once('models/Product.php');

class ProductRepository{
    public function getById($id){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id,title,description,price,stock,picture_url,created_on,updated_on,updated_by FROM products WHERE id='$id'";
        $query = $connection->prepare($sql);
        $query->execute();

        $result = $query->fetch();

        if($result==null){
            return null;
        }

        $product = new Product($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8]);
        return $product;
    }

    public function getProductsForCategory($categoryId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT products.id,title,description,price,stock,picture_url FROM products INNER JOIN category_product_mapping on products.id=category_product_mapping.product_id where is_active=true and category_id=$categoryId";
        $query = $connection->prepare($sql);
        $query->execute();

        $products = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $product = new Product($row["id"],$row["title"],$row["description"],$row["price"],$row["stock"],$row["picture_url"],null,null,null);

            $products[]=$product;
        }

        return $products;
    }

    public function getLatestProducts(){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT * FROM products ORDER BY created_on DESC LIMIT 8";
        $query = $connection->prepare($sql);
        $query->execute();

        $products = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $product = new Product($row["id"],$row["title"],$row["description"],$row["price"],$row["stock"],$row["picture_url"],null,null,null);

            $products[]=$product;
        }

        return $products;
    }

    public function getAll(){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id,title,description,price,stock,picture_url,created_on,updated_on,updated_by FROM products";
        $query = $connection->prepare($sql);
        $query->execute();

        $products = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $product = new Product($row["id"],$row["title"],$row["description"],$row["price"],$row["stock"],$row["picture_url"],$row["created_on"],$row["updated_on"],$row["updated_by"]);

            $products[]=$product;
        }

        return $products;
    }

    public function deleteProduct($id){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $categoryDeleteSql = "DELETE FROM category_product_mapping WHERE product_id=?";
        $stmt = $connection->prepare($categoryDeleteSql);
        $stmt->execute([$id]);

        $productDeleteSql = "DELETE FROM products WHERE id=?";
        $stmt = $connection->prepare($productDeleteSql);
        $stmt->execute([$id]);
    }

    public function addProduct($title,$description,$price,$stock,$pictureUrl,$categoryId,$userId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "INSERT INTO products(title, description, price, stock, picture_url, created_on, updated_by) VALUES (?,?,?,?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$title, $description, $price, $stock, $pictureUrl, date('Y-m-d H:i:s'), $userId]);

        $id = $connection->lastInsertId();

        $categoryInsertSql = "INSERT INTO category_product_mapping(product_id,category_id) values(?,?)";
        $stmt = $connection->prepare($categoryInsertSql);
        $stmt->execute([$id,$categoryId]);
    }

    public function updateProduct($id,$title,$description,$price,$stock,$pictureUrl,$userId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "UPDATE products SET title=?, description=?, price=?, stock=?, picture_url=?, updated_on=?, updated_by=? WHERE id=?";
        $stmt= $connection->prepare($sql);
        $stmt->execute([$title,$description,$price,$stock,$pictureUrl,date('Y-m-d H:i:s'),$userId,$id]);
    }
}

?>