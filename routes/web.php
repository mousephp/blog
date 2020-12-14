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
// nguyen@gmail.com
// 123456
// admin@gmail.com
// 12345678



Route::get('/', function () {
	return view('welcome');
});

//
Auth::routes(['register' => true]);
Route::get('/admin', 'HomeController@index')->name('admin');

//Admin
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	Route::get('/', 'HomeController@index')->name('home');

	Route::resource('categorys','Admin\CategoryController');

	Route::resource('tags','Admin\TagsController');

	Route::get('password','Admin\UserController@getUpdatePassword');
	Route::post('password','Admin\UserController@postUpdatePassword');
	Route::resource('users','Admin\UserController');

	Route::resource('authors','Admin\AuthorController');

	Route::resource('slides','Admin\SlidesController');

	Route::resource('news','Admin\NewsController');

	Route::resource('comments','Admin\CommentController');

});//->middleware('auth')


Route::get('/','ClientController@getHome');
Route::get('category/{id}/{slug}.html','ClientController@getCategory');
Route::get('detail/{id}/{slug}.html','ClientController@getDetail');
Route::post('detail/{id}/{slug}.html','ClientController@postComment');

Route::get('slide/{id}/{slug}.html','ClientController@getDetailslides');

Route::get('about.html','ClientController@getAuthor');
Route::get('author/{id}.html','ClientController@authorDetail');

Route::get('search','ClientController@searchNews');

Route::get('search-tags/{id}.html','ClientController@searchTags')->name('search-tags');
Route::get('tags/{id}.html','ClientController@tags')->name('tags');

Route::get('search-categories/{id}/{slug}.html','ClientController@searchCategories')->name('search-categories');








