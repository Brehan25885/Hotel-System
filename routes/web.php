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
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/indexManager','AdminController@index')->name('datatables');
Route::get('clients/getData','AdminController@getData')->name('datatables.data');
Route::get('/indexClient','AdminController@index');
Route::get('/indexReceptionists','AdminController@index');


