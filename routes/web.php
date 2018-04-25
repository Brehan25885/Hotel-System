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
/* Route::get('/index', function () {
    return view('index');
    
});
 */



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom',[
    'uses'=>"LoginController@login",
    'as'=>'login.custom'
]);
Route::get('/home',function () {
    return view('home');
    
})->name('home');


Route::group(['middleware' =>['role:receptionist']],function(){ 
Route::get('/indexrecep',function () {
    return view('recep.index');  
})->name('indexrecep');
Route::get('reservations','ReceptionistController@indexReserve')->name('reserve');
Route::get('reservations/getdata','ReceptionistController@getReservations')->name('reserve.datareservations');
Route::get('recep/{client}/approve','ReceptionistController@approve');
Route::get('recep','ReceptionistController@index')->name('datatables');
Route::get('recep/getdata','ReceptionistController@getdata')->name('datatables.data');

 }); 
/*  Route::get('assign','ReceptionistController@assignRoles');
 */