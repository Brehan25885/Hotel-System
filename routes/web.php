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


Route::group(['middleware' =>['auth'],['role:receptionist']],function(){ 
Route::get('/indexrecep',function () {
    return view('recep.index');  
})->name('indexrecep');
Route::get('reservations','ReceptionistController@indexReserve')->name('reserve');
Route::get('reservations/getdata','ReceptionistController@getReservations')->name('reserve.datareservations');
Route::get('recep/{client}/approve','ReceptionistController@approve');
Route::get('recep','ReceptionistController@index')->name('datatables');
Route::get('recep/getdata','ReceptionistController@getdata')->name('datatables.data');

 });
 
 
 Route::group(['middleware' =>['auth'],['role:admin']],function(){ 
    Route::get('/indexManager','AdminController@indexManager')->name('tables');
    Route::get('manager/getData','AdminController@getDataManager')->name('tables.data');
    Route::get('/indexRece','AdminController@indexRece')->name('datatable');
    Route::get('rece/getData','AdminController@getDataRece')->name('datatable.data');
    Route::get('/indexClient','AdminController@indexClient')->name('datatables');
    Route::get('client/getData','AdminController@getDataClient')->name('datatables.data');
    Route::get('/admins/{receptionists}/edit','AdminController@editRece');
    Route::put('/admins/{receptionists}/update','AdminController@updateRece');
    Route::get('/admins/{managers}/editm','AdminController@editManager');
    Route::put('/admins/{managers}/updatem','AdminController@updateManager');
    Route::get('/admins/{clients}/editc','AdminController@editClient');
    Route::put('/admins/{clients}/updatec','AdminController@updateClient');
    Route::get('admins/create','AdminController@createRece');
    Route::post('admins','AdminController@storeRece');
    Route::get('admins/createm','AdminController@createManager');
    Route::post('adminsm','AdminController@storeManager');
    Route::get('admins/createc','AdminController@createClient');
    Route::post('adminsc','AdminController@storeClient');
    /* Route::delete('/admins/{admin}/deletec','AdminController@destroy');
     */
    Route::get('/admins/{id}/deletec','AdminController@destroyClient');
    Route::get('/admins/{id}/deletem','AdminController@destroyManager');
    Route::get('ajaxdata/removedatam', 'AdminController@removedataManager')->name('tables.datadestroyManager');
    Route::get('ajaxdata/removedatac', 'AdminController@removedataClient')->name('tables.datadestroyClient');
    Route::get('ajaxdata/removedatar', 'AdminController@removedataRece')->name('tables.datadestroyRece');
     Route::get('/admins/{id}/deleter','AdminController@destroyRece');    
     });


 
   
/*   Route::get('assign','ReceptionistController@assignRoles');
 */