<?php
include_once './app/models/episodios_model.php';
include_once './app/views/apiViewer.php';

class apiControllerEpisodios {
    private $model;

    private $view;

    private $data;

    public function __construct() {
        $this->model = new episodioModel();

        $this->view = new apiViewer();
        
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getEpisodios($serie) {
        $id = $serie[':ID'];
        $episodios = $this->model->getEpisodios($id);

        if($episodios) {
            $this->view->response($episodios);
        } else {
            $this->view->response("Todavia no hay datos de la serie $id" , 404);
        }
    }

    public function getAllEpisodios() {
        $episodios = $this->model->getAllEpisodios();
        $this->view->response($episodios);
    }

    public function deleteEpisodio($param) {
        $id = $param[':ID'];

        $episodio = $this->model->getEpisodio($id);

        if($episodio) {
            $this->model->deleteEpisodio($id);
            $this->view->response($episodio);
        } else {
            $this->view->response("El episodio $id no existe", 404);
        }
    }

    public function addEpisodio($params = null) {
        $episodio = $this->getData();

        if(empty($episodio->Titulo) || empty($episodio->Duracion) || empty($episodio->Temporada) || empty($episodio->Descripcion) ||
        empty($episodio->Puntuacion) || empty($episodio->Serie)) {
            $this->view->response("Es necesario completar todos los datos", 400);
        } else {
            $id = $this->model->insertEpisodio($episodio->Titulo, $episodio->Duracion, $episodio->Temporada, $episodio->Descripcion, $episodio->Puntuacion, $episodio->Serie);
            $episodio = $this->model->getEpisodio($id);
            $this->view->response($episodio,201);
        }
    }
}