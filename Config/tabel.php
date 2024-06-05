<?php
require_once 'database.php';

$db = new Database();
$conn = $db->getConnection();

// Create user table
$conn->exec("CREATE TABLE IF NOT EXISTS user (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR (50) NOT NULL,
    email VARCHAR (255) NOT NULL,
    password VARCHAR(225) NOT NULL,
    usertype VARCHAR (255) NOT NULL
)");

// Create title table
$conn->exec("CREATE TABLE IF NOT EXISTS title (
    id_title INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(225) NOT NULL,
    cover VARCHAR(225) NOT NULL,
    synopsis TEXT
)");
?>
