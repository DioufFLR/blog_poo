<?php

namespace Controllers;

require_once ('libraries/utils.php');
require_once ('libraries/models/Article.php');

class Article
{
    public function index()
    {
        $model = new \Models\Article();

        /**
         * 2. Récupération des articles
         */
        $articles = $model->findAll("created_at DESC");

        /**
         * 3. Affichage
         */
        $pageTitle = "Accueil";
        render('articles/index', compact('pageTitle', 'articles'));
    }

    public function show()
    {
//        Montrer un article
    }

    public function delete()
    {
//        Supprimer un article
    }
}