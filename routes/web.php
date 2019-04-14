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
    return view('layouts/new_app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('admin', 'AdminController');
// Route::resource('user', 'UserController');

Route::group(['middleware' => ['auth','role:admin']], function () {
    // Route::resource('admin', 'AdminController');
    Route::get('admin','AdminController@index')->name('admin.index');
    Route::get('admin/users','AdminController@users')->name('admin.users');
    Route::get('admin/status','AdminController@status')->name('admin.status');
    Route::get('admin/show/{user}','AdminController@show')->name('admin.show');
    Route::get('admin/showUpdate/{user}','AdminController@showUpdate')->name('admin.showUpdate');
    Route::put('admin/update/{user}','AdminController@update')->name('admin.update');
    Route::get('admin/statusAccept/{user}','AdminController@statusAccept')->name('admin.statusAccept');
    Route::get('admin/statusReject/{user}','AdminController@statusReject')->name('admin.statusReject');
    Route::get('admin/statusUnread/{user}','AdminController@statusUnread')->name('admin.statusUnread');
    Route::delete('admin/delete/{user}','AdminController@destroy')->name('admin.delete');
    Route::get('admin/download/{file}','AdminController@download')->name('admin.download');
});

Route::group(['middleware' => ['auth','role:user']], function () {
    // Route::resource('user', 'UserController');
    // Route::get('user/{user}/cv','UserController@show')->name('user.cv');
    // Route::put('user/{user}/upload','UserController@upload')->name('user.upload');
    Route::get('user/{user}','UserController@index')->name('user');
    Route::post('user','UserController@store')->name('user.store');
    Route::get('user/{user}/edit','UserController@edit')->name('user.edit');
    Route::put('user/{user}','UserController@update')->name('user.update');
    Route::put('user/uploadCV/{user}','UserController@uploadCV')->name('user.uploadCV');
});