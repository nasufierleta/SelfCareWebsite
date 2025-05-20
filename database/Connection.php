<?php
class DBConnection
{
    private $host = 'localhost';
    private $dbname = 'selfcaredb';
    private $username = 'root';
    private $password = '';

    public function getConnection()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->username", "$this->password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
        return $pdo;
    }
}
?>