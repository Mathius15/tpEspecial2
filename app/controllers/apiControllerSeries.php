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
        $series = $this->model->getSeries();
        $this->view->response($series);
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
        }
    }
 
    

}
