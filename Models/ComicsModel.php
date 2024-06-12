<?php
class ComicsModel
{
    private $conn;
    private $table_name = 'Comics';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllComics()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertComic($data)
    {
        $query = "INSERT INTO " . $this->table_name . " (Title, Author, Genre, Description, PublishDate, ImageURL) VALUES (:title, :author, :genre, :description, :publishDate, :imageURL)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $data['Title']);
        $stmt->bindParam(':author', $data['Author']);
        $stmt->bindParam(':genre', $data['Genre']);
        $stmt->bindParam(':description', $data['Description']);
        $stmt->bindParam(':publishDate', $data['PublishDate']);
        $stmt->bindParam(':imageURL', $data['ImageURL']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateComic($id, $data)
    {
        $query = "UPDATE " . $this->table_name . " SET Title = :title, Author = :author, Genre = :genre, Description = :description, PublishDate = :publishDate, ImageURL = :imageURL WHERE ComicID = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $data['Title']);
        $stmt->bindParam(':author', $data['Author']);
        $stmt->bindParam(':genre', $data['Genre']);
        $stmt->bindParam(':description', $data['Description']);
        $stmt->bindParam(':publishDate', $data['PublishDate']);
        $stmt->bindParam(':imageURL', $data['ImageURL']);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteComic($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE ComicID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
