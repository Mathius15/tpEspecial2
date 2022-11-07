<?php
require_once './app/controllers/apiControllerSeries.php';
require_once './app/controllers/apiControllerEpisodios.php';

require_once 'libs/router.php';

$rt = new Router();

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$rt->addRoute('series', 'GET', 'apiControllerSeries', 'getSeries');
$rt->addRoute('serie/:ID', 'GET', 'apiControllerSeries', 'getSerie');

$rt->addRoute('episodios', 'GET', 'apiControllerEpisodios', 'getAllEpisodios');
$rt->addRoute('episodios/:ID', 'GET', 'apiControllerEpisodios', 'getEpisodios');

$rt->addRoute('serie/:ID', 'DELETE', 'apiControllerSeries', 'deleteSerie');
$rt->addRoute('episodio/:ID', 'DELETE', 'apiControllerEpisodios', 'deleteEpisodio');

$rt->addRoute('serie/:ID', 'POST', 'apiController', 'addSeries');
$rt->addRoute('episodio/:ID', 'POST', 'apiControllerEpisodios', 'addEpisodio');


$rt->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
