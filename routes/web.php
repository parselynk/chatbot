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

Route::get('/sample', 'TicketController@index');

Route::get('/ticket', 'TicketController@all')->name('home'); 

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


Route::get('/user','UserController@index');



