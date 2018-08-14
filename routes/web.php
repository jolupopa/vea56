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

Route::get('/', 'WelcomeController@index');
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('/products/{id}', 'ProductController@show'); // mostrar detalle producto
Route::get('/categories/{category}', 'CategoryController@show'); // mostrar detalle producto

Route::get('/search', 'SearchController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products', 'ProductController@index'); //listado
	Route::get('/products/create', 'ProductController@create'); // formulario
	Route::post('/products', 'ProductController@store'); //registrar
	Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario edicion
	Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
	Route::delete('/products/{id}', 'ProductController@destroy'); // formulario eliminar

	Route::get('/products/{id}/images', 'ImageController@index'); //listado
	Route::post('/products/{id}/images', 'ImageController@store'); //registro
	Route::delete('/products/{id}/images', 'ImageController@destroy'); // formulario eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //destacar

	Route::get('/categories', 'CategoryController@index'); //listado
	Route::get('/categories/create', 'CategoryController@create'); // formulario
	Route::post('/categories', 'CategoryController@store'); //registrar
	Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario edicion
	Route::post('/categories/{category}/edit', 'CategoryController@update'); //actualizar
	Route::delete('/categories/{category}', 'CategoryController@destroy'); // formulario eliminar
});
