<?php

require_once ('libraries/database.php');

class Comment
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    /**
     * Retourne la liste des commentaires d'un article donné
     *
     * @param integer $article_id
     * @return array
     */
    public function findAllWithArticle(int $article_id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

    /**
     * Permet de retrouver un commentaire s'il existe dans la base de données
     *
     * @param integer $id
     * @return array|bool le commentaire si on le trouve, false si on ne le trouve pas
     */
    public function find(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        $comment = $query->fetch();
        return $comment;
    }

    /**
     * Supprime un commentaire dans la base de données grâce à son identifiant
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id) : void
    {
        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    /**
     * Insère un commentaire dans la base de données
     *
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id) : void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}