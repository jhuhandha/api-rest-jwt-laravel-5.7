<?php

Route::post('register', 'AuthController@register');

Route::post('login', 'AuthController@login');

Route::post('recover', 'AuthController@recover');

Route::group(['middleware' => ['jwt.auth']], function() {

    Route::get('logout', 'AuthController@logout');
    
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });

    Route::resource('/producto', 'ProductoController')->except([
        'create', 'edit'
    ]);

    Route::get('/categorias/select', 'CategoriaController@select');
});