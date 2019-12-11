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

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::redirect('home','products');
    Route::redirect('/','products');
    Route::resources(
    [
        'products' => 'ProductController',
        'categories' => 'CategoryController'
    ]);
    Route::get('/search','ProductController@search');  
    Route::get('/deletePhoto', 'ProductController@deletePhoto');
});

