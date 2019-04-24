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

Route::get('/', 'CatalogueController@index')->name('home');

Route::get('book/{id}', 'BookController@show')->where("n", '[0-9]+')->name('details');
Route::get('book/add', 'BookController@create')->name('addBook');
Route::post('book/add', 'BookController@store')->name('sendAddBook');

Route::post('category/add', 'CategoryController@store')->name('addCategory');
Route::post('category/edit/{id}', 'CategoryController@update')->name('editCategory');

