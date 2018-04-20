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

Route::get('/', 'TicketController@index')->name('home');
Route::get('/home', 'TicketController@index');


Route::get('/tickets', 'TicketController@tickets')->middleware('auth.haspermission:sa-view-ticket');


Route::get('/test', 'TicketController@test');
Route::match(['get', 'post'], '/botman/{project}', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/register', 'RegistrationController@create')->middleware('auth.haspermission:sa-create-user');
Route::post('/register', 'RegistrationController@store')->middleware('auth.haspermission:sa-create-user');
Route::get('/profile', 'UserController@profile');
Route::post('/profile/update', 'SessionController@update');

Route::get('/resetpassword', 'UserController@resetPassword');
Route::post('/resetpassword', 'SessionController@resetPassword');

Route::get('/forgotpassword', 'ForgetPasswordController@askForEmail')->middleware('guest');
Route::post('/forgotpassword', 'ForgetPasswordController@sendToken')->middleware('guest');

Route::get('/resetpassword/{token}', 'ForgetPasswordController@askForNewPassword')->middleware('guest');
Route::post('/resetforgottenpassword', 'ForgetPasswordController@store')->middleware('guest');


Route::get('/user', 'UserController@index');
Route::post('/user/role', 'UserController@updateRole');

Route::get('/permission/{user}', 'PermissionController@index')->middleware('auth.haspermission:sa-update-user');
Route::get('/permission/{user}/ticket', 'PermissionController@projects');
Route::get('/permission/{user}/ticket/{project}', 'PermissionController@projectPermissions');


Route::post('/permission', 'PermissionController@update')->middleware('auth.haspermission:sa-update-user');

Route::get('/permission', 'PermissionController@create')->middleware('auth.haspermission:sa-create-permission');
Route::post('/permission/create', 'PermissionController@store')->middleware('auth.haspermission:sa-create-permission');
Route::get('/permission/delete/{permission}', 'PermissionController@delete')->middleware('auth.haspermission:sa-delete-permission');

Route::get('/role', 'RoleController@index')->middleware('auth.haspermission:sa-view-role');
Route::post('/role', 'RoleController@update')->middleware('auth.haspermission:sa-update-role');

Route::get('/role/{role}', 'RoleController@permissions')->middleware('auth.haspermission:sa-view-role');
