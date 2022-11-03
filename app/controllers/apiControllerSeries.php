<?php
include_once '../views/apiViewer';
include_once '../models/episodios_model.php';
include_once '../models/serie_model.php';


class apiController {
    private $modelSerie;
    private $modelEpisodio;

    private $view;

    private $data;

    public function __construct() {
        $this->modelSerie = new serieModel();
        $this->modelEpisodio = new episodioModel();

        $this->view = new apiViewer();
        
        $this->data = file_get_contents("php://input");
    }

    public function getSeries() {
        $series = $this->modelSerie->getSeries();
        $this->view->response($series);
        }

    public function getSerie($serie) {
        $serie = $this->modelSerie->getSerie($serie);
        $this->view->response($serie);
    }
 
    

}
