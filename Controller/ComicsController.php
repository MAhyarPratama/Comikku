<?php
include_once (__DIR__ . '/../Models/ComicsModel.php');
include_once (__DIR__ . '/../Services/ComicsService.php');

class ComicsController
{
    private $comicsService;

    public function __construct($db)
    {
        $comicsModel = new ComicsModel($db);
        $this->comicsService = new ComicsService($comicsModel);
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
}
