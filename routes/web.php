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

Route::get('/', 'BooksController@index')->name('books');
Route::get('category/{category}', 'BooksController@filterByCategory')->name('by.category');
Route::get('author/{author}', 'BooksController@filterByAuthor')->name('by.author');
Route::get('book/{book}', 'BooksController@show')->name('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

