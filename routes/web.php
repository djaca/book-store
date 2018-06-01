<?php

Route::get('', 'BooksController@index');
Route::get('books', 'BooksController@index')->name('books');
Route::get('books/book/{book}', 'BooksController@show')->name('book');
Route::get('books/{category}', 'BooksController@index')->name('category');

Auth::routes();

Route::delete('cart/empty', 'CartController@emptyCart')->name('cart.empty');
Route::resource('cart', 'CartController', ['except' => ['show', 'edit']]);

Route::get('checkout', 'CheckoutController@create')->name('checkout');
Route::post('checkout', 'CheckoutController@store');

Route::resource('orders', 'OrdersController', ['only' => ['index', 'show']]);

Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::resource('books', 'BooksController', ['as' => 'admin', 'except' => ['show']]);
    Route::resource('categories', 'CategoriesController', ['as' => 'admin', ['except' => 'show']]);
    Route::resource('orders', 'OrdersController', ['as' => 'admin', 'only' => ['index', 'show']]);
    Route::resource('users', 'UsersController', ['as' => 'admin', 'only' => ['index', 'show']]);
});

