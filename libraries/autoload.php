<?php

/**
 * Gère le chargement automatique des classes lorsqu'on les demande !
 */
spl_autoload_register(function ($className) {
    $className = str_replace("\\", '/', $className);
//    $className = lcfirst($className); // Problème sur système linux pourquoi ? Sûrement dû à un composant dans php.ini
    require_once("libraries/$className.php");

});
