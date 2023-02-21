<?php

spl_autoload_register(function ($className)
{
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = lcfirst($className); // Pour linux
//
    require_once ("libraries/$className.php");
});