<?php

require_once('vendor/autoload.php');

use App\Controller\AppController;
use App\Router\Router;

AppController::index();  ///comme si collais le code car statique

/// mes routes que j'ai definies : ce qu'on attrape dans le lien et l'action derrière


$router = new Router($_GET['url']);

//montrer article 
$router->get('/article/:id', 'App\Controllers\ArticleController@show');
//ajouter article
$router->get('/addarticle', 'App\Controllers\ArticleController@add');
$router->post('/addarticle', 'App\Controllers\ArticleController@add');
//modifier article
$router->get('/modifyarticle/:id', 'App\Controllers\ArticleController@modify');
$router->post('/modifyarticle/:id', 'App\Controllers\ArticleController@modify');
//supprimer article
$router->get('/deletearticle/:id', 'App\Controllers\ArticleController@delete');

//montrer commentaire
$router->get('/commentaire/:id', 'App\Controllers\CommentaireController@show');
//ajouter commentaire
$router->get('/addcommentaire', 'App\Controllers\CommentaireController@add');
$router->post('/addcommentaire', 'App\Controllers\CommentaireController@add');
//modifier commentaire
$router->get('/modifycommentaire/:id', 'App\Controllers\CommentaireeController@modify');
$router->post('/modifycommentaireid', 'App\Controllers\CommentaireController@modify');
//supprimer commentaire
$router->get('/deletecommentaire/:id', 'App\Controllers\CommentaireController@delete');


$router->run();