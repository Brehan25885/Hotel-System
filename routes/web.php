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

 //for client part
 Route::resource('clients','ClientsController');
 Route::resource('rooms','RoomsController');
 Route::resource('getrooms','GetroomsController');
 Route::get('reservations/rooms/{room}/{client}','ClientsController@createRes');
 Route::post('reservations','ClientsController@storeRes');
 //
 Route::get('/home', 'HomeController@index')->name('home');

 Route::post('/login/custom',[
    'uses'=>"LoginController@login",
    'as'=>'login.custom'
 ]);




/*Route::get('/home',function () {
    return view('home');
    
})->name('home');*/


Route::group(['middleware' =>['auth'],['role:receptionist']],function(){ 
Route::get('/indexrecep',function () {
    return view('recep.index');  
})->name('indexrecep');
Route::get('reservations','ReceptionistController@indexReserve')->name('reserve');
Route::get('reservations/getdata','ReceptionistController@getReservations')->name('reserve.datareservations');
Route::get('recep/{client}/approve','ReceptionistController@approve');
Route::get('recep','ReceptionistController@index')->name('receptables');
Route::get('recep/getdata','ReceptionistController@getdata')->name('receptables.data');

 });
 
 
 Route::group(['middleware' =>['auth'], ['role:admin']],function(){ 
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
     Route::get('admins/profile','AdminController@AdminProfile');
     Route::put('/admins/{id}/updatep','AdminController@updateAdmin');

     });
      //for client part
     Route::resource('clients','ClientsController');


 Route::group(['middleware' =>['auth'],['role:manager']],function(){ 

     Route::get('manageresp','ManageRespController@index')->name('ResptionistController.index');
     Route::get('manageresp/getdata','ManageRespController@getdata')->name('ResptionistController.getdata');
     Route::get('manageresp/{id}/edit','ManageRespController@edit')->name('ResptionistController.edit');
     Route::get('createresp','ManageRespController@create')->name('ResptionistController.create');
     Route::post('storeresp','ManageRespController@store')->name('ResptionistController.sto');
     Route::put('manageresp/{id}/update','ManageRespController@update')->name('ResptionistController.update');
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
    
 });
 
   
/*   Route::get('assign','ReceptionistController@assignRoles');
 */