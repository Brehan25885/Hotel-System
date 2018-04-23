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
Route::get('/indexManager','AdminController@indexManager')->name('tables');
Route::get('manager/getData','AdminController@getDataManager')->name('tables.data');
Route::get('/indexRece','AdminController@indexRece')->name('datatable');
Route::get('rece/getData','AdminController@getDataRece')->name('datatable.data');
Route::get('/indexClient','AdminController@indexClient')->name('datatables');
Route::get('client/getData','AdminController@getDataClient')->name('datatables.data');
Route::get('/admins/{admin}/edit','AdminController@editRece');
Route::put('/admins/{admin}/update','AdminController@updateRece');
Route::get('/admins/{admin}/editm','AdminController@editManager');
Route::put('/admins/{admin}/updatem','AdminController@updateManager');
Route::get('/admins/{admin}/editc','AdminController@editClient');
Route::put('/admins/{admin}/updatec','AdminController@updateClient');
Route::get('admins/create','AdminController@createRece');

Route::post('admins','AdminController@storeRece');



