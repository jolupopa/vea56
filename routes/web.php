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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
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
});
