<?php
include_once './app/models/episodios_model.php';
include_once './app/views/apiViewer.php';
include_once './app/helpers/apiHelper.php';

class apiControllerEpisodios {
    private $model;

    private $view;

    private $data;

    private $token;

    public function __construct() {
        $this->model = new episodioModel();

        $this->view = new apiViewer();

        $this->token = new apiHelper();
        
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getEpisodios($serie) {
        $token = $this->token->tokenTrue();
        if($token) {
            $id = $serie[':ID'];
            $episodios = $this->model->getEpisodios($id);
    
            if($episodios) {
                $this->view->response($episodios);
            } else {
                $this->view->response("Todavia no hay datos de la serie $id" , 404);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }

    public function getAllEpisodios() {
        $token = $this->token->tokenTrue();
        if($token) {
            if(isset($_GET["select"])) {
                $campo = $_GET["select"];
                if($campo === "Titulo" || $campo === "Duracion" || $campo === "Temporada" || $campo === "Descripcion" || $campo === "Puntuacion" || $campo === "Serie"){
                    $episodios = $this->model->getEpisodiosCampo($campo);
                    $this->view->response($episodios);
                } else {
                    $this->view->response("El campo $campo no existe", 404);
                }
            } else {
                $episodios = $this->model->getAllEpisodios();
                $this->view->response($episodios);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }

    public function deleteEpisodio($param) {
        $token = $this->token->tokenTrue();
        if($token) {
            $id = $param[':ID'];
    
            $episodio = $this->model->getEpisodio($id);
    
            if($episodio) {
                $this->model->deleteEpisodio($id);
                $this->view->response($episodio);
            } else {
                $this->view->response("El episodio $id no existe", 404);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }

    public function addEpisodio($params = null) {
        $token = $this->token->tokenTrue();
        if($token) {
            $episodio = $this->getData();
    
            if(empty($episodio->Titulo) || empty($episodio->Duracion) || empty($episodio->Temporada) || empty($episodio->Descripcion) ||
            empty($episodio->Puntuacion) || empty($episodio->Serie)) {
                $this->view->response("Es necesario completar todos los datos", 400);
            } else {
                $id = $this->model->insertEpisodio($episodio->Titulo, $episodio->Duracion, $episodio->Temporada, $episodio->Descripcion, $episodio->Puntuacion, $episodio->Serie);
                $episodio = $this->model->getEpisodio($id);
                $this->view->response("Episodio creado con exito",201);
            }
        } else {
            $this->view->response("ACCESO DENEGADO", 401);
        }
    }
}