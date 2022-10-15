<?php
require_once './app/models/serie_model.php';
require_once './app/views/review_view.php';
require_once 'helper.php';

class serieController {
    private $view;
    private $model;
    private $helper;

    public function __construct() {
        $this->view = new ReviewView;
        $this->model = new serieModel;
        $this->helper = new helper;
        $this->userView = new userView;
    }

    public function showSeries() {
        $bool = $this->helper->booleanLog();
        $series = $this->model->getSeries(); 
        $this->view->showSeries($series, $bool);
    }

    public function showAddSerie() {
        $bool = $this->helper->booleanLog();
        if ($bool) {
            $this->view->showAddSerie($bool);
        } else {
            $this->userView->errorUser($bool);
        }
    }

    function addSerie() {
        $bool = $this->helper->booleanLog();
        if ($bool) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $puntuacion = $_POST['puntuacion'];
            $creadores = $_POST['creadores'];
            $genero = $_POST['genero'];
        }

        if(empty($nombre)||empty($descripcion)||empty($puntuacion)||empty($creadores)||empty($genero)){
            $this->view->error("ES NECESARIO COMPLETAR TODOS LOS CAMPOS", $bool);
        }
        if($_FILES['imagen']['type']== "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
        || $_FILES['imagen']['type'] == "image/png") {
            $this->model->insertSerie($nombre, $descripcion, $puntuacion, $creadores, $genero, $_FILES['imagen']);
            header("Location: " . BASE_URL); 
        }

    }

    public function deleteSerie($serie){
        $this->helper->checkLoggedIn();
        $this-> model->deleteTodosEpisodios($serie);
        $this-> model->deleteSerie($serie);
        header("Location: " . BASE_URL);
    }

    function showEditSerie() {
        $bool = $this->helper->booleanLog();
        $series = $this->model->getSeries();
        if ($bool) {
            $this->view->editSerie($series, $bool);
        } else {
            $this->userView->errorUser($bool);
        }
    }

    function editSerie(){
        $bool = $this->helper->booleanLog();
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $puntuacion = $_POST['puntuacion'];
        $creadores = $_POST['creadores'];
        $genero = $_POST['genero'];
        $serie = $_POST['serie'];
        $imagen = $_FILES['imagen'];

        //$info = getimagesize($_FILES['imagen']['tmp_name']);

        if (empty($_FILES['imagen']['tmp_name'])) {
            $imagen = null;
        }

        if($serie == "Seleccionar serie a Editar") {
            $this->view->error("ES NECESARIO SELECCIONAR UNA SERIE", $bool);
        } else{
            $this->model->editSerie($nombre, $descripcion, $puntuacion, $creadores, $genero,$serie, $imagen);
            header("Location: " . BASE_URL);
        }

    }
}

