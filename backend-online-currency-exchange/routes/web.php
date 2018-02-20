<?php


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('login', array(
    'uses' => 'Controller@showLogin'
));

Route::post('login', array(
    'uses' => 'Controller@doLogin'
));

Route::resource('/currency', 'CurrencyController')->middleware('auth');
Route::resource('/order', 'OrderController')->middleware('auth');
Route::put('order/updateStatus/{id}', 'OrderController@updateStatus')->name('order.updateStatus')->middleware('auth');
Route::resource('/banknote', 'BanknoteController')->middleware('auth');
Route::resource('/user', 'UserController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

