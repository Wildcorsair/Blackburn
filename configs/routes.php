<?php

use FoxTool\Yukon\Core\Router;

Router::get('/', function() {
    echo 'Home Page';
});

Router::prefix('/admin')->group(function() {
    Router::get('/users', 'UserController@index');
    Router::post('/users', 'UserController@create');
    Router::get('/users/{id}', 'UserController@show');
    Router::put('/users/{id}', 'UserController@update');
    Router::delete('/users/{id}', 'UserController@delete');
});

Router::get('/posts', 'UserController@index');
