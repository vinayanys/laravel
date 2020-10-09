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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
