<?php

    $router->get('/workspace/public/', 'HomeController@index');
    $router->get('/workspace/public/listings', 'ListingController@index');
    $router->get('/workspace/public/listings/create', 'ListingController@create');
    $router->get('/workspace/public/listing/{id}', 'ListingController@show');
    $router->post('/workspace/public/listings', 'ListingController@store');
?>