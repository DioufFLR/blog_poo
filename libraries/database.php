<?php

/**
 * @return PDO
 */
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'user', '2704', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}

/**
 * Retourne la liste des articles classés par date de création
 *
 * @return array
 */
function findAllArticles(): array
{
    $pdo = getPdo();
    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    $articles = $resultats->fetchAll();

    return $articles;
}

function findArticle(int $id): array
{
    $pdo = getPdo();

    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    $query->execute(['article_id' => $id]);
    $article = $query->fetch();

    return $article;
}

function findAllComments(int $article_id): array
{
    $pdo = getPdo();

    $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $article_id]);
    $commentaires = $query->fetchAll();

    return $commentaires;
}