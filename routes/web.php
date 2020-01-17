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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::get('/products/{id}', 'ProductController@show');

Route::post('/order', 'CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/products', 'ProductController@index');//Listado
    Route::get('/products/create', 'ProductController@create');//Formulario
    Route::post('/products', 'ProductController@store');//Registrar
    Route::get('/products/{id}/edit', 'ProductController@edit');//Formulario edición
    Route::post('/products/{id}/edit', 'ProductController@update');//Actualizar
    Route::delete('/products/{id}', 'ProductController@destroy');//Form Eliminar

    Route::get('/products/{id}/images', 'ImageController@index');//Listado
    Route::post('/products/{id}/images', 'ImageController@store');//Registrar
    Route::delete('/products/{id}/images', 'ImageController@destroy');//Form Eliminar
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select');//destacar

    Route::get('/categories', 'CategoryController@index');//Listado
    Route::get('/categories/create', 'CategoryController@create');//Formulario
    Route::post('/categories', 'CategoryController@store');//Registrar
    Route::get('/categories/{category}/edit', 'CategoryController@edit');//Formulario edición
    Route::post('/categories/{category}/edit', 'CategoryController@update');//Actualizar
    Route::delete('/categories/{category}', 'CategoryController@destroy');//Form Eliminar
});