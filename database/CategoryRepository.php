<?php
include_once('Connection.php');
include_once('models/Category.php');

class CategoryRepository{
    public function getAll(){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id,name,description,picture_url,created_on,updated_on,updated_by FROM `categories`";
        $query = $connection->prepare($sql);
        $query->execute();

        $categories = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $category = new Category($row["id"],$row["name"],$row["description"],$row["picture_url"],$row["created_on"],$row["updated_on"],$row["updated_by"]);
            $categories[] = $category;
        }

        return $categories;
    }

    public function getById($id){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id,name,description,picture_url,created_on,updated_on,updated_by from categories where id=$id";
        $query = $connection->prepare($sql);
        $query->execute();

        $result = $query->fetch();

        if($result==null){
            return null;
        }

        $category = new Category($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6]);
        return $category;
    }

    public function deleteCategory($id){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $mappingDeleteSql = "DELETE FROM category_product_mapping WHERE category_id=?";
        $stmt = $connection->prepare($mappingDeleteSql);
        $stmt->execute([$id]);

        $categoryDeleteSql = "DELETE FROM categories WHERE id=?";
        $stmt = $connection->prepare($categoryDeleteSql);
        $stmt->execute([$id]);
    }

    public function addCategory($name,$description,$pictureUrl,$userId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "INSERT INTO categories(name, description, picture_url, created_on, updated_by) VALUES (?,?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$name, $description, $pictureUrl, date('Y-m-d H:i:s'), $userId]);
    }

    public function updateCategory($id,$name,$description,$pictureUrl,$userId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "UPDATE categories SET name=?, description=?, picture_url=?, updated_on=?, updated_by=? WHERE id=?";
        $stmt= $connection->prepare($sql);
        $stmt->execute([$name,$description,$pictureUrl,date('Y-m-d H:i:s'),$userId,$id]);
    }
}

?>