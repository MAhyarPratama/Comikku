<?php
include_once (__DIR__ . '/../Models/ComicsModel.php');

class ComicsService
{
    private $comicsModel;

    public function __construct(ComicsModel $comicsModel)
    {
        $this->comicsModel = $comicsModel;
    }

    public function getAllComics()
    {
        return $this->comicsModel->getAllComics();
    }

    public function createComic($data)
    {
        return $this->comicsModel->insertComic($data);
    }

    public function updateComic($id, $data)
    {
        return $this->comicsModel->updateComic($id, $data);
    }

    public function deleteComic($id)
    {
        return $this->comicsModel->deleteComic($id);
    }
}
