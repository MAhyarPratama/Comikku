<?php
require_once (__DIR__ . '/../Config/database.php');

class Tabel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createTables() {
        $queries = [
            "CREATE TABLE IF NOT EXISTS Users (
                UserID INT AUTO_INCREMENT PRIMARY KEY,
                Username VARCHAR(50) UNIQUE NOT NULL,
                Email VARCHAR(100) UNIQUE NOT NULL,
                PasswordHash VARCHAR(255) NOT NULL,
                Role VARCHAR(20) NOT NULL
            )",
            "CREATE TABLE IF NOT EXISTS Comics (
                ComicID INT AUTO_INCREMENT PRIMARY KEY,
                Title VARCHAR(255) NOT NULL,
                Author VARCHAR(100) NOT NULL,
                Genre VARCHAR(50),
                Description TEXT,
                PublishDate DATE,
                ImageURL TEXT
            )",
            "CREATE TABLE IF NOT EXISTS UserComics (
                UserComicID INT AUTO_INCREMENT PRIMARY KEY,
                UserID INT NOT NULL,
                ComicID INT NOT NULL,
                FOREIGN KEY (UserID) REFERENCES Users(UserID),
                FOREIGN KEY (ComicID) REFERENCES Comics(ComicID)
            )"
        ];

        foreach ($queries as $query) {
            $this->conn->exec($query);
        }
    }
}

$tabel = new Tabel();
$tabel->createTables();
?>
