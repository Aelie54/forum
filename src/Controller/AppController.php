<?php

namespace App\Controller;
use App\Entity\Author;
use App\Entity\Article;
use App\Entity\Commentaire;
use App\Entity\Editor;
use Router\Router;

class AppController
{
    public static function index()
    {
        include '../forum/src/view/Homepage.php';
    }

    public static function notFound(){
        include '.forum/routes/404.html';
    }
}
