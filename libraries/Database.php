<?php

class Database
{
    /**
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '2704', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}



