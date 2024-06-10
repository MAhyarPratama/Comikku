<?php
include_once 'Models/ComicsModel.php';
include_once 'Services/ComicsService.php';

class ComicsController
{
    private $comicsService;

    public function __construct($conn)
    {
        $comicsModel = new ComicsModel($conn);
        $this->comicsService = new ComicsService($comicsModel);
    }

    public function getComics()
    {
        $comics = $this->comicsService->fetchAllComics();
        echo json_encode($comics);
    }

    public function createComic()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $this->comicsService->addComic($data);
            echo json_encode(['success' => $result]);
        }
        else
        {
            http_response_code(403);
            echo json_encode(['error' => 'Forbidden']);
        }
    }

    public function updateComic($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $this->comicsService->modifyComic($id, $data);
            echo json_encode(['success' => $result]);
        }
        else
        {
            http_response_code(403);
            echo json_encode(['error' => 'Forbidden']);
        }
    }

    public function deleteComic($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
        {
            $result = $this->comicsService->removeComic($id);
            echo json_encode(['success' => $result]);
        }
        else
        {
            http_response_code(403);
            echo json_encode(['error' => 'Forbidden']);
        }
    }
}
?>