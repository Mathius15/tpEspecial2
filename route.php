<?php
require_once './app/controllers/episodio_controller.php';
require_once './app/controllers/user_controller.php';
require_once './app/controllers/serie_controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}



// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);


$episodioController = new episodioController();
$userController = new userController();
$serieController = new serieController();


switch ($params[0]) {
    case 'home':
        $serieController->showSeries();
        break;

    case 'login':
        $userController->showLogin();
        break;

    case 'logout':
        $userController->logout();

    case 'validacion':
        $userController->validarUsuario();
        break;

    case'serie':
        $episodioController->showEpisodios($params[1]);
        break;

    case 'addSerie':
        $serieController->showAddSerie();
        break;

    case 'addSerieForm':
        $serieController->addSerie();
        break;
    
    case 'addEpisodio':
        $episodioController->showAddEpisodio();
        break;
    
    case 'addEpisodioo':
        $episodioController->addEpisodio();
        break;

    case 'borrarSerie':
        $id = $params[1];
        $serieController->deleteSerie($id);
        break;

    case 'borrarEpisodio':
        $id = $params[1];
        $episodioController->deleteEpisodio($id);
        break;
    
    case 'editSerie':
        $serieController->showEditSerie();
        break;
    
    case 'editSerieForm':
        $serieController->editSerie();
        break;
    
    case 'editEpisodio':
        $id = $params[1];
        $episodioController->showEditEpisodio($id);
        break;

    case 'editEpisodioForm':
        $id = $params[1];
        $episodioController->editEpisodio($id);
        break;
        
}
