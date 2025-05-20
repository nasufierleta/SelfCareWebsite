<?php
require_once('Connection.php');
require_once('models/Customer.php');

class CustomerRepository{
    public function getUser($email){
        $database = new DBConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id, name, surname, email, hashed_password, user_role, phone_number, birthdate, gender, created_on, updated_on FROM customers where email like '$email'";
        $query = $connection->prepare($sql);
        $query->execute();

        $userResult = $query->fetch();

        if($userResult==null){
            return null;
        }
        
        $id = $userResult[0];
        $name = $userResult[1];
        $surname = $userResult[2];
        $email = $userResult[3];
        $password = $userResult[4];
        $role = $userResult[5];
        $phone = $userResult[6];
        $birthdate = $userResult[7];
        $gender = $userResult[8];
        $created_on = $userResult[9];
        $updated_on = $userResult[10];


        $user = new Customer($id,$name,$surname,$email,$password,$role,$phone,$birthdate,$gender,$created_on,$updated_on,null);

        return $user;
    }

    public function loginUser($email,$password){
        $user = $this->getUser($email);

        if($user==null)
        {
            return null;
        }

        $hashedPassword = $this->hashPassword($password);

        if($user->password==$hashedPassword){
            return $user;
        }
    }

    public function getEmailById($id){
        $database = new DBConnection();
        $connection = $database->getConnection();

        $sql = "SELECT email FROM customers where id like '$id'";
        $query = $connection->prepare($sql);
        $query->execute();

        $userResult = $query->fetch();

        if($userResult==null){
            return null;
        }

        return $userResult[0];  
    }

    public function getCustomerById($id){
        $database = new DBConnection();
        $connection = $database->getConnection();

        $sql = "SELECT name,surname,email FROM customers where id like '$id'";
        $query = $connection->prepare($sql);
        $query->execute();

        $userResult = $query->fetch();

        if($userResult==null){
            return null;
        }

        return $userResult;  //array of strings
    }

    public function getAll(){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT id,name,surname,email,user_role,phone_number,birthdate,gender,created_on,updated_on,updated_by FROM customers";
        $query = $connection->prepare($sql);
        $query->execute();

        $categories = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $id = $row["id"];
            $name = $row["name"];
            $surname = $row["surname"];
            $email = $row["email"];
            $role = $row["user_role"];
            $phone = $row["phone_number"];
            $birthdate = $row["birthdate"];
            $gender = $row["gender"];
            $created_on = $row["created_on"];
            $updated_on = $row["updated_on"];
            $updated_by = $row["updated_by"];
            
            $category = new Customer($id,$name,$surname,$email,null,$role,$phone,$birthdate,$gender,$created_on,$updated_on,$updated_by);
            $categories[] = $category;
        }

        return $categories;
    }

    public function customerHasOrders($customerId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "SELECT count(*) FROM user_orders where customer_id=$customerId";
        $query = $connection->prepare($sql);
        $query->execute();

        $result = $query->fetch();

        if($result[0]!=0){
            return true;
        }

        return false;
    }

    public function addCustomer($name,$surname,$email,$password,$phone,$birthdate,$gender){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $hashedPassword = $this->hashPassword($password);
        $currentDate = date('Y-m-d H:i:s');

        $sql = "INSERT INTO customers(name, surname, email, hashed_password, phone_number, birthdate, gender, user_role, created_on) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$name, $surname, $email, $hashedPassword, $phone, $birthdate, $gender, 'regular', $currentDate]);

        $id = $connection->lastInsertId();

        $customer = new Customer($id,$name,$surname,$email,null,'regular',$phone,$birthdate,$gender,$currentDate,null,null);
        return $customer;
    }

    public function udpdateToAdmin($id,$userId){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $sql = "UPDATE customers SET user_role='admin', updated_on=?, updated_by=? WHERE id=?";
        $stmt= $connection->prepare($sql);
        $stmt->execute([date('Y-m-d H:i:s'),$userId,$id]);
    }

    public function deleteCustomer($id){
        $database = new DbConnection();
        $connection = $database->getConnection();

        $mappingDeleteSql = "DELETE FROM wishlist WHERE customer_id=?";
        $stmt = $connection->prepare($mappingDeleteSql);
        $stmt->execute([$id]);

        $categoryDeleteSql = "DELETE FROM customers WHERE id=?";
        $stmt = $connection->prepare($categoryDeleteSql);
        $stmt->execute([$id]);
    }

    public function hashPassword($password){
        return hash('sha256',$password);
    }
}
?>