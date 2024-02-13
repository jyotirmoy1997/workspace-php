<?php
    require '../helpers.php';
    require basePath('Database.php');

    $config = require basePath('config/db.php');

    $db = new Database($config);


    require basePath('Router.php');

    // Defining the Router
    $router = new Router();

    // Initializing the Routes
    require basePath('routes.php');

    // Get the current URI and HTTP Method
    $uri = $_SERVER["REQUEST_URI"];
    $method = $_SERVER["REQUEST_METHOD"];

    // Route the request
    $router->route($uri, $method);

?>