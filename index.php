<?php

session_start();

require_once('vendor/autoload.php');

use App\Controller\AppController;
use App\Router\Router;

AppController::index();  ///comme si collais le code car statique

/// mes routes que j'ai definies : ce qu'on attrape dans le lien et l'action derrière


$router = new Router($_GET['url']);




$router->run();