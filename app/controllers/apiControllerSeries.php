<?php
include_once './app/models/serie_model.php';
include_once './app/views/apiViewer.php';
include_once './app/helpers/apiHelper.php';

class apiControllerSeries {
    private $model;

    private $view;

    private $data;

    private $token;

    public function __construct() {
        $this->model = new serieModel();

        $this->view = new apiViewer();

        $this->token = new apiHelper();
        
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getSeries() {
        $token = $this->token->tokenTrue();
        if($token) {
            if(isset($_GET["select"]) && isset($_GET["sortBy"])) {
                $campo = $_GET["select"];
                $sortBy = $_GET["sortBy"];
                if($campo === "Nombre" || $campo === "Descripcion" || $campo === "Puntuacion" || $campo === "Creadores" || $campo === "Genero") {                
                    $series = $this->model->getSerieCampoSort($campo,$sortBy);
                    $this->view->response($series);
                } else {
                    $this->view->response("El campo $campo no existe", 404);
                }
            } elseif(isset($_GET["select"])) {
                $campo = $_GET["select"];
                if($campo === "Nombre" || $campo === "Descripcion" || $campo === "Puntuacion" || $campo === "Creadores" || $campo === "Genero") {                
                    $series = $this->model->getSerieCampo($campo);
                    $this->view->response($series);
                } else{
                    $this->view->response("El campo $campo no existe", 404);
                }
            } elseif(isset($_GET["sortBy"])) { //me fijo si me dan un parametro para ordenar
                $sortBy = $_GET["sortBy"];
                if($sortBy == "ASC" || $sortBy == "DESC"){
                    $series = $this->model->getSeries($sortBy);
                    $this->view->response($series);
                } else {
                    $this->view->response("Solo se puede ordenar con ASC o DESC", 404);
                }
            } else {
                $series = $this->model->getSeries();
                $this->view->response($series);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }

    public function getSerie($param) {
        $token = $this->token->tokenTrue();
        if($token) {
            $id = $param[':ID'];
        
            $serie = $this->model->getSerie($id);
                
            if($serie) {
                $this->view->response($serie);
            } else {
                $this->view->response("Todavia no hay datos de la serie $id" , 404);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }
    

    public function deleteSerie($param) {
        $token = $this->token->tokenTrue();
        if($token) {
            $id = $param[':ID'];
    
            $serie = $this->model->getSerie($id);
    
            if($serie) {
                $this->model->deleteSerie($id);
                $this->view->response($serie);
            } else {
                $this->view->response("La serie $id no existe", 404);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }

    public function addSerie() {
        $token = $this->token->tokenTrue();
        if($token) {
            $serie = $this->getData();
    
            if(empty($serie->Nombre) || empty($serie->Descripcion) || empty($serie->Puntuacion) || empty($serie->Creadores) ||
            empty($serie->Genero)) {
                $this->view->response("Es necesario completar todos los datos", 400);
            } else {
                $id = $this->model->insertSerie($serie->Nombre, $serie->Descripcion, $serie->Puntuacion, $serie->Creadores, $serie->Genero);
                $episodio = $this->model->getSerie($id);
                $this->view->response($serie,201);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }

}
