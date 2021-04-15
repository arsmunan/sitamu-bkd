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


Auth::routes();
// Route::get('/test', 'AdminController@index')->name('home');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/bidang', 'FieldsController@index')->name('bidang');

//Route::get('/layanan', 'ServicesController@index')->name('layanan');
Route::group(['middleware' => ['auth','level:admin']], function () {
    Route::resource('bidang', 'FieldsController');
    Route::resource('layanan', 'ServicesController');
    Route::resource('user', 'UsersController');
});
Route::group(['middleware' => ['auth','level:user,admin']], function () {
    Route::get('/home', 'AdminController@index')->name('home');
});

// Route::group(['middleware' => 'auth'], function(){

// });

Route::get('/', 'GuestsController@index')->name('create-guest');
Route::post('/add-guest', 'GuestsController@addguest')->name('add-guest');
Route::get('/purpose/{id}', 'GuestsController@createpurpose')->name('create-purpose');
Route::post('/purpose', 'GuestsController@storepurpose')->name('add-purpose');
Route::get('/rating/{id}', 'GuestsController@createrating')->name('create-rating');
Route::post('/rating', 'GuestsController@storerating')->name('add-rating');
Route::get('purpose/purposesub/{id}', 'GuestsController@GetSubCatAgainstMainCatEdit');
