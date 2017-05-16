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

Auth::routes();

Route::get('/adminpage', function () {
    return view('admin.home');
});

Route::group(['middleware' => 'web'], function () {

    // User CRUD Module
	Route::get('adminpage/userCRUD', [
		'uses' => 'UserController@index',
		'as' => 'userCRUD.index',
	]);

    Route::get('adminpage/userCRUD/create', [
        'uses' => 'UserController@create',
        'as' => 'userCRUD.create',
    ]);

    Route::post('adminpage/userCRUD/store/', [
        'uses' => 'UserController@store',
        'as' => 'userCRUD.store',
    ]);

    Route::get('adminpage/userCRUD/{id}/', [
        'uses' => 'UserController@show',
        'as' => 'userCRUD.show',
    ]);

    Route::get('adminpage/userCRUD/{id}/edit', [
        'uses' => 'UserController@edit',
        'as' => 'userCRUD.edit',
    ]);

    Route::post('adminpage/userCRUD/{id}/update/', [
        'uses' => 'UserController@update',
        'as' => 'userCRUD.update',
    ]);

    Route::delete('adminpage/userCRUD/{id}/destroy', [
        'uses' => 'UserController@destroy',
        'as' => 'userCRUD.destroy',
    ]);
});