<?php

// render('articles/shows')
function render(string $path, array $variables = [])
{
    extract($variables);
    ob_start();
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();
    require('templates/layout.html.php');
}

// redirect('index.php')
function redirect(string $url): void
{
    header("Location: $url");
    exit();
}