<?php
include_once './app/models/serie_model.php';
include_once './app/views/apiViewer.php';

class apiControllerSeries {
    private $modelSerie;
    private $modelEpisodio;

    private $view;

    private $data;

    public function __construct() {
        $this->modelSerie = new serieModel();

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
