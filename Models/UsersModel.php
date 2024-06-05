<?php
require_once __DIR__ . '/../config/database.php';

class UsersModel {
    private $conn;
    private $table_name = "user";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllUsers() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($data) {
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, email=:email, password=:password, usertype=:usertype";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":username", $data['username']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":password", $data['password']);
        $stmt->bindParam(":usertype", $data['usertype']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function checkCredentials($data) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email AND password = :password";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":password", $data['password']);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
