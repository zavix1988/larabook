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

//Administration routes
Auth::routes();

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => ['auth']],
	function()
	{
		Route::get('/', 'DashboardController@index')->name('admin.index');
		Route::resource('/books', 'BooksController', ['as' => 'admin']);
		Route::resource('/authors', 'AuthorsController', ['as' => 'admin']);
		Route::resource('/genres', 'GenresController', ['as' => 'admin']);

	});

	Route::group([],
		function()
		{
			Route::get('/', 'DashboardController@viewAllBooks')->name('index');
			Route::get('/{sort}/{direction}', 'DashboardController@viewAllBooks')->name('index.sort');
			//Route::get('/books/{sort}/{direction}', 'DashboardController@booksByAuthor')->name('index.books');
			Route::get('/{slug}', 'DashboardController@viewOneBook')->name('index.book');
		});

// User routes

/*Route::get('/', function () {
    return view('welcome');
});*/




//Route::get('/home', 'HomeController@index')->name('home');
