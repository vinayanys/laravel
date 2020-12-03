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

Route::get('home', 'HomeController@home');
Route::get('about', 'AboutController@about');
Route::get('articles', 'ArticleController@articles');

Route::get('bloghome', 'BlogHomeController@bloghome');
Route::get('blogpost', 'BlogPostController@blogpost');

Route::get('article', 'Article2Controller@article');
//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//
Route::get('/awal', 'HomeControllerawal@awal')->name('awal');
	Route::get('/about', 'AboutController@about')->name('about');
	Route::get('/articles/{id}', 'ArticlesController@viewArticles');
	Route::get('/categories/{cat}', 'CategoriesController');
	Route::get('/logout', 'LogoutController@logout');
Auth::routes();

Route::get('/logout' ,function(){
	$logout=Auth::logout();
	return view('auth.login');
});
Route::get('/' ,function(){
	return view('auth.login');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/manage', 'ArticlesController@index')->name('manage');
Route::get('/artikel/add','ArticlesController@add');
Route::post('/artikel/create','ArticlesController@create');
Route::get('/artikel/edit/{id}','ArticlesController@edit');
Route::post('/artikel/update/{id}','ArticlesController@update');
Route::get('/artikel/delete/{id}','ArticlesController@delete');

Route::get('/article/cetak_pdf', 'ArticlesController@cetak_pdf');


Route::get('/manageUser', 'UsersController@User') ->name('manageUser');
Route::get('/manageUser/edit/{id}', 'UsersController@edit')->name('edit');
Route::get('/manageUser/add', 'UsersController@add');
Route::post('/manageUser/create', 'UsersController@create');
Route::post('/manageUser/update/{id}', 'UsersController@update');
Route::get('/manageUser/delete/{id}', 'UsersController@delete');
Route::get('/manageUser/cetakpdf', 'UsersController@cetak_pdf');