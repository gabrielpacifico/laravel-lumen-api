<?php

$router->get('/api/carros', 'CarrosController@GetAll');

$router->group(['prefix' => '/api/carro'], function () use ($router){
    
    $router->get('/{id}', 'CarrosController@Get');
    $router->post('/', 'CarrosController@Insert');
    $router->put('/{id}', 'CarrosController@Update');
    $router->delete('/{id}', 'CarrosController@Delete');
    
});

