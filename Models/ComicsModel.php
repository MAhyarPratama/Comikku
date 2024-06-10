<?php
class ComicsModel
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn = $db;
        $tables = include('config/table.php');
        $this->table_name = $tables['comics'];
    }

    public function readAllComics()
    {
        try
        {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function insertComic($data)
    {
        try
        {
            $query = "INSERT INTO " . $this->table_name . " (Title, Author, Genre, Description, PublishDate, ImageURL) VALUES (:Title, :Author, :Genre, :Description, :PublishDate, :ImageURL)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":Title", $data['Title']);
            $stmt->bindParam(":Author", $data['Author']);
            $stmt->bindParam(":Genre", $data['Genre']);
            $stmt->bindParam(":Description", $data['Description']);
            $stmt->bindParam(":PublishDate", $data['PublishDate']);
            $stmt->bindParam(":ImageURL", $data['ImageURL']);

            return $stmt->execute();
        
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateComic($id, $data)
    {
        try
        {
            $query = "UPDATE " . $this->table_name . " SET Title = :Title, Author = :Author, Genre = :Genre, Description = :Description, PublishDate = :PublishDate, ImageURL = :ImageURL WHERE ComicID = :ComicID";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":Title", $data['Title']);
            $stmt->bindParam(":Author", $data['Author']);
            $stmt->bindParam(":Genre", $data['Genre']);
            $stmt->bindParam(":Description", $data['Description']);
            $stmt->bindParam(":PublishDate", $data['PublishDate']);
            $stmt->bindParam(":ComicID", $id);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteComic($id)
    {
        try
        {
            $query = "DELETE FROM " . $this->table_name . " WHERE ComicID = :ComicID";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":ComicID", $id);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>