<?php
include_once (__DIR__ . '/../Models/ComicsModel.php');
include_once (__DIR__ . '/../Services/ComicsService.php');

class ComicsController
{
    private $comicsService;
    private $db;

    public function __construct($db)
    {
        $comicsModel = new ComicsModel($db);
        $this->comicsService = new ComicsService($comicsModel);
        $this->db = $db;
    }

    public function getComics()
    {
        $comics = $this->comicsService->getAllComics();
        $this->sendOutput(json_encode($comics, JSON_PRETTY_PRINT));
    }

    private function sendOutput($data, $statusCode = 200)
    {
        header("Content-Type: application/json");
        http_response_code($statusCode);
        echo $data;
    }

    public function deleteComic($id) {
        $sql = "DELETE FROM comics WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
