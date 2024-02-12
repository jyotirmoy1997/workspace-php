<?php
    require '../helpers.php';
    // loadView('home');

    $routes = [
        '/workspace/public/' => 'controllers/home.php',
        '/workspace/public/listings' => 'controllers/listings/index.php',
        '/workspace/public/listings/create' => 'controllers/listings/create.php',
        '404' => 'controllers/errors/404.php'
    ];

    $uri = $_SERVER["REQUEST_URI"];

    // inspectAndDie($uri);

    if(array_key_exists($uri, $routes)){
        require(basePath($routes[$uri]));
    }
    else{
        require(basePath($routes['404']));
    }

?>