<?php
class UserModel
{
    private $conn;
    private $table_name = 'Users';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function findUser($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }    

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result); // Tambahkan ini untuk melihat output
        return $result;
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersByRole($role)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Role = :role";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUserById($id)
    {
        // SQL query to delete a user by ID
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}
