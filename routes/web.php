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


Route::get('/messenger', function () {
    return view('welcome');
});

Route::get('/sample', 'TicketController@index');

Route::get('/', 'TicketController@index')->name('home'); 


Route::get('/tickets', 'TicketController@tickets'); 


Route::get('/test', 'TicketController@test');
Route::match(['get', 'post'], '/botman/{project}', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::get('/login','SessionController@create')->name('login');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');
Route::get('/profile','UserController@profile');
Route::post('/profile/update','SessionController@update');

Route::get('/resetpassword','UserController@resetPassword');
Route::post('/resetpassword','SessionController@resetPassword');

Route::get('/forgotpassword','ForgetPasswordController@askForEmail');
Route::post('/forgotpassword','ForgetPasswordController@sendToken');

Route::get('/resetpassword/{token}','ForgetPasswordController@askForNewPassword');
Route::post('/resetforgottenpassword','ForgetPasswordController@store');


Route::get('/user','UserController@index');

Route::get('/permission/{user}','PermissionController@index');
Route::post('/permission','PermissionController@update');

Route::get('/permission','PermissionController@create');
Route::get('/permission/delete/{permission}','PermissionController@delete');

Route::post('/permission/create','PermissionController@store');


Route::get('/role','RoleController@index');
Route::post('/role','RoleController@update');

Route::get('/role/{role}','RoleController@permissions');






