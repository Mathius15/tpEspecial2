<?php
require_once './app/models/episodios_model.php';
require_once './app/models/serie_model.php';
require_once './app/views/review_view.php';
require_once 'helper.php';

class episodioController {
    private $view;
    private $model;
    private $helper;

    public function __construct() {
        $this->view = new ReviewView;
        $this->model = new episodioModel;
        $this->modelSerie = new serieModel;
        $this->helper = new helper;
        $this->userView = new userView;

    }

    public function showEpisodios($serie) {
        $bool = $this->helper->booleanLog();
        $episodios = $this->model->getEpisodios($serie);
        $this->view->showEpisodios($episodios, $bool);
    }

    public function showAddEpisodio() {
        $bool = $this->helper->booleanLog();
        $series = $this->modelSerie->getSeries();

        if ($bool) {
            $this->view->showAddEpisodio($series, $bool);
        } else {
            $this->userView->errorUser($bool);
        }
        
    }

    function addEpisodio() {
        $bool = $this->helper->booleanLog();
        $titulo = $_POST['titulo'];
        $duracion = $_POST['duracion'];
        $temporada = $_POST['temporada'];
        $descripcion = $_POST['descripcion'];
        $puntuacion = $_POST['puntuacion'];
        $serie = $_POST['serie'];

        if(empty($titulo)||empty($duracion)||empty($temporada)||empty($descripcion)||empty($puntuacion)||empty($serie)){
            $this->view->error("ES NECESARIO COMPLETAR TODOS LOS CAMPOS", $bool);
        }else if($serie == "Serie del episodio:"){
            $this->view->error("ES NECESARIO SELECCIONAR A QUE SERIE PERTENECE", $bool);
        }else{
            $id = $this->model->insertEpisodio($titulo, $duracion, $temporada, $descripcion, $puntuacion,$serie);
            
            header("Location: " . BASE_URL); 
        }
    }
    
    public function deleteEpisodio($episodio){
        $this->helper->checkLoggedIn();
        $this-> model->deleteEpisodio($episodio);
        header("Location: " . BASE_URL);
    }

    public function editEpisodio($id) {
        $this->helper->checkLoggedIn();
        $titulo = $_POST['titulo'];
        $duracion = $_POST['duracion'];
        $temporada = $_POST['temporada'];
        $descripcion = $_POST['descripcion'];
        $puntuacion = $_POST['puntuacion'];

        $this->model->editEpisodio($titulo,$duracion,$temporada,$descripcion,$puntuacion,$id);
        header("Location: " . BASE_URL);

    }

    public function showEditEpisodio($episodio) {
        $bool = $this->helper->booleanLog();
        $ep = $this->model->getEpisodioById($episodio);
        if ($bool) {
            $this->view->showEditEpisodio($ep, $bool);
        } else {
            $this->userView->errorUser($bool);
        }
        
    }
}