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

// Администраторские маршруты

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

// Маршруты для обратной связи

Route::group(['prefix' => 'callback'],
	function(){
		Route::get('/', 'CallbackController@all')->name('index.callback');
		Route::post('/message', 'CallbackController@callBack')->name('callback.message');
	}
);

// Маршруты для незарегистрированых пользователей

Route::group([],
	function()
	{
		Route::get('/', 'DashboardController@viewAllBooks')->name('index');
		Route::get('/sort/{sort}/{direction}', 'DashboardController@viewAllBooks')->name('index.sort');
		Route::get('/pricefilter', 'DashboardController@filterByPrice')->name('index.filter.price');
		Route::get('/authorfilter', 'DashboardController@filterByAuthor')->name('index.filter.author');
		Route::get('/genrefilter', 'DashboardController@filterByGenre')->name('index.filter.genre');
		Route::get('/book/{slug}', 'DashboardController@viewOneBook')->name('index.book');

	});
