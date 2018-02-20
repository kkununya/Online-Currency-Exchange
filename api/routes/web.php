<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'currency'], function () use ($router){
    $router->get('/', 'CurrencyController@getAll');
    $router->get('/{id}', 'CurrencyController@getOne');
});

$router->group(['prefix' => 'purpose'], function () use ($router){
    $router->get('/', 'PurposeController@getAll');
    $router->get('/{id}', 'PurposeController@getOne');
});

$router->group(['prefix' => 'branch'], function () use ($router){
    $router->get('/', 'BranchController@getAll');
    $router->get('/{id}', 'BranchController@getOne');
});

$router->group(['prefix' => 'order'], function () use ($router){
    $router->get('/', 'OrderController@getAll');
    $router->get('/{id}', 'OrderController@getOne');
    $router->post('/', 'OrderController@store');
    $router->put('/', 'OrderController@update');
    $router->put('/updateStatus', 'OrderController@updateStatus');
});

$router->group(['prefix' => 'customer'], function () use ($router){
    $router->get('/', 'CustomerController@getAll');
    $router->post('/', 'CustomerController@store');
});

$router->group(['prefix' => 'receiver'], function () use ($router){
    $router->get('/', 'ReceiverController@getAll');
    $router->post('/', 'ReceiverController@store');
});

$router->group(['prefix' => 'orderdetail'], function () use ($router){
    $router->get('/', 'OrderDetailController@getAll');
    $router->get('/{id}', 'OrderDetailController@getOne');    
    $router->post('/', 'OrderDetailController@store');
});

$router->group(['prefix' => 'orderstatus'], function () use($router){
    $router->get('/', 'StatusController@getAll');
    $router->get('/{id}', 'StatusController@getOne');
});

$router->group(['prefix' => 'banknote'], function () use($router){
    $router->get('/', 'banknoteController@getAll');
    $router->get('/{id}', 'banknoteController@getOne');
});

$router->group(['prefix' => 'banknotetransaction'], function () use($router){
    $router->get('/', 'BanknoteTransactionController@getAll');
    $router->post('/', 'BanknoteTransactionController@store');
});

$router->group(['prefix' => 'user'], function () use($router){

});