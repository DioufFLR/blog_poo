<?php

/**
 * Gère le chargement automatique des classes lorsqu'on les demande !
 */
spl_autoload_register(function ($className) {
    $className = str_replace("\\", '/', $className);
    $className = lcfirst($className); // Pour linux
    var_dump($className);
    require_once("libraries/$className.php");

});
