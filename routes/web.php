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
    return view('login');
});

	// Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // User & Registration Routes...
    Route::get('user/register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
    Route::post('user/register', 'Auth\RegisterController@register')->name('user.store');
	Route::get('/user', 'UserController@index')->name('user');
	Route::get('/user/{id}/destroy', 'UserController@destroy')->name('user.destroy');
	
	// Dashboard Routes... 
	Route::get('/home', 'HomeController@index')->name('home');

	// Master Category Routes...
	Route::get('/master/category', 'MasterCategoryController@index')->name('category');
	Route::get('/master/category/create', 'MasterCategoryController@create')->name('category.create');
	Route::post('/master/category', 'MasterCategoryController@store')->name('category.store');
	Route::get('/master/category/{id}', 'MasterCategoryController@show')->name('category.show');
	Route::get('/master/category/{id}/edit', 'MasterCategoryController@edit')->name('category.edit');
	Route::put('/master/category/{id}', 'MasterCategoryController@update')->name('category.update');
	Route::patch('/master/category/{id}', 'MasterCategoryController@update')->name('category.update');
	Route::get('/master/category/{id}/destroy', 'MasterCategoryController@destroy')->name('category.destroy');
	
	// Master Source Routes...
	Route::get('/master/source', 'MasterSourceController@index')->name('source');
	Route::get('/master/source/create', 'MasterSourceController@create')->name('source.create');
	Route::post('/master/source', 'MasterSourceController@store')->name('source.store');
	Route::get('/master/source/{id}', 'MasterSourceController@show')->name('source.show');
	Route::get('/master/source/{id}/edit', 'MasterSourceController@edit')->name('source.edit');
	Route::put('/master/source/{id}', 'MasterSourceController@update')->name('source.update');
	Route::patch('/master/source/{id}', 'MasterSourceController@update')->name('source.update');
	Route::get('/master/source/{id}/destroy', 'MasterSourceController@destroy')->name('source.destroy');
	
	// Master Content Routes...
	Route::get('/master/content', 'MasterContentController@index')->name('content');
	Route::get('/master/content/create', 'MasterContentController@create')->name('content.create');
	Route::post('/master/content', 'MasterContentController@store')->name('content.store');
	Route::get('/master/content/{id}', 'MasterContentController@show')->name('content.show');
	Route::get('/master/content/{id}/edit', 'MasterContentController@edit')->name('content.edit');
	Route::put('/master/content/{id}', 'MasterContentController@update')->name('content.update');
	Route::patch('/master/content/{id}', 'MasterContentController@update')->name('content.update');
	Route::get('/master/content/{id}/destroy', 'MasterContentController@destroy')->name('content.destroy');