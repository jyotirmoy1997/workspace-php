<?php

    $router->get('/workspace/public/', 'controllers/home.php');
    $router->get('/workspace/public/listings', 'controllers/listings/index.php');
    $router->get('/workspace/public/listings/create', 'controllers/listings/create.php')

?>