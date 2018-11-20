<?php

Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');

Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');



// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get("/hola", "HomeController@hola");

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/producto', 'ProductoController@index');
// Route::get('/producto/crear', 'ProductoController@crear');
// Route::post('/producto/guardar', 'ProductoController@guardar');