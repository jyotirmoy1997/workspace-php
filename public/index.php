<?php
    require '../helpers.php';
    require basePath('Router.php');

    // Defining the Router
    $router = new Router();

    // Initializing the Routes
    require basePath('routes.php');

    $uri = $_SERVER["REQUEST_URI"];
    $method = $_SERVER["REQUEST_METHOD"];

    echo  $uri . " " . $method;

    $router->route($uri, $method);

?>