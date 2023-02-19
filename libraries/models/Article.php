<?php

require_once ('libraries/database.php');

class Article {
    /**
     * Retourne la liste des articles classés par date de création
     *
     * @return array
     */
    public function findAllArticles(): array
    {
        $pdo = getPdo();
        $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();
        return $articles;
    }

    /**
    * Retourne un article grâce à son identifiant
    *
    * @param integer $id
    * @return void
    */
    public function findArticle(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
        $query->execute(['article_id' => $id]);
        $article = $query->fetch();
        return $article;
    }

    /**
    * Supprime un article dans la base de données grâce à son identifiant
    *
    * @param integer $id
    * @return void
    */
    public function deleteArticle(int $id) : void
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}