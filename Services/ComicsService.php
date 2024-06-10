<?php
include_once 'models/ComicsModel.php';

class ComicsService
{
    private $comicsModel;

    public function __construct(ComicsModel $comicsModel)
    {
        $this->comicsModel = $comicsModel;
    }

    public function fetchAllComics()
    {
        $comics = $this->comicsModel->readAllComics();
        $comicsArray = $comics->fetchAll(PDO::FETCH_ASSOC);
        return $comicsArray;
    }

    public function addComic($data)
    {
        return $this->comicsModel->insertComic($data);
    }

    public function modifyComic($id, $data)
    {
        return $this->comicsModel->updateComic($id, $data);
    }

    public function removeComic($id)
    {
        return $this->comicsModel->deleteComic($id);
    }
}
?>