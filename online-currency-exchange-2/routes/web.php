<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment/direct-login', function () {
    return view('payment.direct-debit.direct-debit-1');
})->name('direct');

Route::get('/payment/direct-select', function () {
    return view('payment.direct-debit.direct-debit-2');
})->name('direct');

Route::get('/payment/direct-otp', function () {
    return view('payment.direct-debit.direct-debit-3');
})->name('direct');

Route::get('/payment/credit', function () {
    return view('payment.credit.credit');
})->name('credit');

Route::resource('/order', 'OrderController');
Route::resource('/customer', 'CustomerController');
Route::resource('/currency', 'CurrencyController');
