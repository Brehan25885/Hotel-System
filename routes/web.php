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
/* Route::get('/indexrecep', function () {
    return view('recep.index');
    
});
 */
Route::get('recep','ReceptionistController@index')->name('datatables');
Route::get('recep/getdata','ReceptionistController@getdata')->name('datatables.data');

/* Route::controller('datatables', 'DatatablesController', [
    'getdata'  => 'datatables.data',
    'index' => 'datatables',
]); */

Route::get('reservations','ReceptionistController@indexReserve')->name('reserve');
Route::get('reservations/getdata','ReceptionistController@getReservations')->name('reserve.datareservations');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom',[
    'uses'=>"LoginController@login",
    'as'=>'login.custom'
]);
Route::group(['middleware'=>'auth'],function(){
 Route::get('/home',function () {
    return view('home');
    
})->name('home');
Route::get('/indexrecep',function () {
    return view('recep.index');
    
})->name('indexrecep');
 }); 
 Route::get('recep/{client}/approve','ReceptionistController@approve');



 Route::get('manageresp','ManageRespController@index')->name('ResptionistController.index');
 Route::get('manageresp/getdata','ManageRespController@getdata')->name('ResptionistController.getdata');
 Route::get('manageresp/{id}/edit','ManageRespController@edit')->name('ResptionistController.edit');
 Route::get('createresp','ManageRespController@create')->name('ResptionistController.create');
 Route::post('store','ManageRespController@store')->name('ResptionistController.store');
 Route::post('manageresp/{id}/update','ManageRespController@update')->name('ResptionistController.update');
 //Route::get('manageresp/{id}/delete','ManageRespController@destroy')->name('ResptionistController.delete');
 Route::get('manageresp/delete','ManageRespController@removedata')->name('ResptionistController.delete');




