<?php
include_once './app/models/serie_model.php';
include_once './app/views/apiViewer.php';

class apiControllerSeries {
    private $model;

    private $view;

    private $data;

    public function __construct() {
        $this->model = new serieModel();

        $this->view = new apiViewer();
        
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getSeries() {
        //$series = $this->model->getSeries();
        //$this->view->response($series);
        if(isset($_GET["sortBy"])) { //me fijo si me dan un parametro para ordenar
            $sortBy = $_GET["sortBy"];
            if($sortBy == "ASC" || $sortBy == "DESC")
            $series = $this->model->getSeries($sortBy);
            $this->view->response($series);
        } else {
            $series = $this->model->getSeries();
            $this->view->response($series);
        }
    }

    public function getSerie($param) {
        $id = $param[':ID'];
    
        $serie = $this->model->getSerie($id);
            
        if($serie) {
            $this->view->response($serie);
        } else {
            $this->view->response("Todavia no hay datos de la serie $id" , 404);
        }
    }
    

    public function deleteSerie($param) {
        $id = $param[':ID'];

        $serie = $this->model->getSerie($id);

        if($serie) {
            $this->model->deleteSerie($id);
            $this->view->response($serie);
        } else {
            $this->view->response("La serie $id no existe", 404);
        }
    }

    public function addSerie() {
        $serie = $this->getData();

        if(empty($serie->Nombre) || empty($serie->Descripcion) || empty($serie->Puntuacion) || empty($serie->Creadores) ||
        empty($serie->Genero)) {
            $this->view->response("Es necesario completar todos los datos", 400);
        } else {
            $id = $this->model->insertSerie($serie->Nombre, $serie->Descripcion, $serie->Puntuacion, $serie->Creadores, $serie->Genero);
            $episodio = $this->model->getSerie($id);
            $this->view->response($serie,201);
        }
    }

}
