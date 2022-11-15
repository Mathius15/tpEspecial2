<?php
require_once './app/controllers/apiControllerSeries.php';
require_once './app/controllers/apiControllerEpisodios.php';
require_once './app/controllers/apiControllerUser.php';
require_once './app/helpers/apiHelper.php';

require_once 'libs/router.php';

$rt = new Router();

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$rt->addRoute('series', 'GET', 'apiControllerSeries', 'getSeries');
$rt->addRoute('serie/:ID', 'GET', 'apiControllerSeries', 'getSerie');

$rt->addRoute('episodios', 'GET', 'apiControllerEpisodios', 'getAllEpisodios');
$rt->addRoute('episodios/:ID', 'GET', 'apiControllerEpisodios', 'getEpisodios');

$rt->addRoute('serie/:ID', 'DELETE', 'apiControllerSeries', 'deleteSerie');
$rt->addRoute('episodio/:ID', 'DELETE', 'apiControllerEpisodios', 'deleteEpisodio');

$rt->addRoute('serie', 'POST', 'apiControllerSeries', 'addSerie');
$rt->addRoute('episodio', 'POST', 'apiControllerEpisodios', 'addEpisodio');

$rt->addRoute('users/token', 'GET', 'apiControllerUser', 'getToken');
$rt->addRoute('users/:ID', 'GET', 'apiControllerUser', 'getUsuario');

$rt->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
