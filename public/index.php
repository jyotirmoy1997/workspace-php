<?php
    require '../helpers.php';
    require __DIR__ . '/../vendor/autoload.php';

    use Framework\Router;
    use Framework\Database;


    $config = require basePath('config/db.php');

    $db = new Database($config);

    // Defining the Router
    $router = new Router();

    // Initializing the Routes
    require basePath('routes.php');

    // Get the current URI and HTTP Method
    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $method = $_SERVER["REQUEST_METHOD"];

    inspect($uri);

    // Route the request
    $router->route($uri, $method);

?>