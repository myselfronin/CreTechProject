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

Route::get('/','LandingPageController@index');
Route::post('/user','UsersController@store')->name('user_register');

//For creating role
Route::get('/role','RoleController@index');
Route::post('/role','RoleController@store')->name('create_role');