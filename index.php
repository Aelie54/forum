<?php

require_once('vendor/autoload.php');

use App\Controller\AppController;
use App\Router\Router;

AppController::index();  ///comme si collais le code car statique

/// mes routes que j'ai definies : ce qu'on attrape dans le lien et l'action derrière


$router = new Router($_GET['url']);

//montrer article 
$router->get('/article/:id', 'App\Controller\ArticleController@show');
//ajouter article
$router->get('/addarticle', 'App\Controller\ArticleController@add');
$router->post('/addarticle', 'App\Controller\ArticleController@add');
//modifier article
$router->get('/modifyarticle/:id', 'App\Controller\ArticleController@modify');
$router->post('/modifyarticle/:id', 'App\Controller\ArticleController@modify');
//supprimer article
$router->get('/deletearticle/:id', 'App\Controller\ArticleController@delete');

//montrer commentaire
$router->get('/commentaire/:id', 'App\Controller\CommentaireController@show');
//ajouter commentaire
$router->get('/addcommentaire', 'App\Controller\CommentaireController@add');
$router->post('/addcommentaire', 'App\Controller\CommentaireController@add');
//modifier commentaire
$router->get('/modifycommentaire/:id', 'App\Controller\CommentaireeController@modify');
$router->post('/modifycommentaireid', 'App\Controller\CommentaireController@modify');
//supprimer commentaire
$router->get('/deletecommentaire/:id', 'App\Controller\CommentaireController@delete');

$router->run();