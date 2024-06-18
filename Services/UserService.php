<?php

class UserService
{
    private $userModel;
    private $conn;

    public function __construct($userModel, $db)
    {
        $this->userModel = $userModel;
        $this->conn = $db;
    }

    public function getAllUsers()
    {
        return $this->userModel->getAllUsers();
    }

    public function getUsersByRole($role)
    {
        return $this->userModel->getUsersByRole($role);
    }

    public function addUser($user_data)
    {
        if ($this->conn === null) {
            error_log("Database connection is null");
            throw new Exception("Database connection is not initialized.");
        }
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':username' => $user_data['username'],
            ':password' => $user_data['password'],
            ':role' => $user_data['role']
        ]);
    }
    
    public function deleteUser($id) 
    {
        $query = "DELETE FROM users WHERE UserID = :id"; // Updated column name
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}
