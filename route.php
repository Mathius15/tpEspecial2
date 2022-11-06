<?php
require_once './app/controllers/apiControllerSeries.php';

require_once 'libs/router.php';

$rt = new Router();

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$rt->addRoute('series', 'GET', 'apiControllerSeries', 'getSeries');
$rt->addRoute('serie/:ID', 'GET', 'apiControllerSeries', 'getSerie');

$rt->addRoute('episodios', 'GET', 'apiController', 'getEpisodios');
$rt->addRoute('episodio/:ID', 'GET', 'apiController', 'getEpisodio');

$rt->addRoute('serie/:ID', 'DELETE', 'apiController', 'deleteSerie');
$rt->addRoute('episodio/:ID', 'DELETE', 'apiController', 'deleteEpisodio');

$rt->addRoute('serie/:ID', 'POST', 'apiController', 'addSeries');
$rt->addRoute('episodio/:ID', 'POST', 'apiController', 'addEpisodio');


$rt->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
