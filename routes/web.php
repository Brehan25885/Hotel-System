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
 Route::post('storeresp','ManageRespController@store')->name('ResptionistController.sto');
 Route::post('manageresp/{id}/update','ManageRespController@update')->name('ResptionistController.update');
 //Route::get('manageresp/{id}/delete','ManageRespController@destroy')->name('ResptionistController.delete');
 Route::get('manageresp/delete','ManageRespController@removedata')->name('ResptionistController.delete');
 Route::get('managerfloor','ManageFloorController@index')->name('FloorController.index');
 Route::get('managerfloor/getdata','ManageFloorController@getdata')->name('FloorController.getdata');
 Route::get('createfloor','ManageFloorController@create')->name('FloorController.create');
 Route::post('storefloor','ManageFloorController@store')->name('FloorController.store');
 Route::get('managerfloor/{id}/edit','ManageFloorController@edit')->name('FloorController.edit');
 Route::post('managerfloor/{id}/update','ManageFloorController@update')->name('FloorController.update');
 Route::get('managerfloor/delete','ManageFloorController@removedata')->name('FloorController.delete');
 Route::get('managerroom','ManageRoomController@index')->name('RoomController.index');
 Route::get('managerroom/getdata','ManageRoomController@getdata')->name('RoomController.getdata');
 Route::get('createroom','ManageRoomController@create')->name('RoomController.create');
 Route::post('storeroom','ManageRoomController@store')->name('RoomController.store');
 Route::get('managerRoom/{id}/edit','ManageRoomController@edit')->name('RoomController.edit');
 Route::post('managerRoom/{id}/update','ManageRoomController@update')->name('RoomController.update');
 Route::get('managerRoom/delete','ManageRoomController@removedata')->name('RoomController.delete');

