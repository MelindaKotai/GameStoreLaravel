<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Auth::routes();

Route::get('/home',  function () {
    return view('home');
})->name('home');


Route::get('/produse','JocuriController@index')->name('produse');

Route::get('/DetaliiProdus/{id}','JocuriController@show');


Route::delete('/Delete/{id}','JocuriController@delete')->middleware('auth');

Route::get('/Create', 'JocuriController@createform')->middleware('auth');

Route::post('/CreateProduct','JocuriController@create')->middleware('auth');


Route::get('/Edit/{id}','JocuriController@edit')->middleware('auth');
Route::patch('/Update','JocuriController@update')->middleware('auth');

Route::get('/Users','UserController@index')->middleware('auth');

Route::get('/DeleteUser/{id}','UserController@show')->middleware('auth');

Route::delete('/DeleteUserConfirm/{id}','UserController@delete')->middleware('auth');

Route::get('/CreateUser', function () {
    return view('createuser');
})->middleware('auth');

Route::post('/CreateUserConfirm','UserController@create');
Route::get('/MyAccount','UserController@myaccount')->middleware('auth');

Route::patch('/UpdateUser','UserController@update')->middleware('auth');

Route::get('/SchimbaParola',function () {
    return view('schimbaparola');
})->middleware('auth');

Route::post('/SchimbaParolaConfirm','UserController@changepassword')->middleware('auth');



Route::get('/Cos', 'CosController@index')->middleware('auth');
Route::get('/add-to-cart', 'CosController@add')->middleware('auth');
Route::post('/update-cart', 'CosController@update')->middleware('auth'); 
Route::post('/remove-from-cart', 'CosController@delete')->middleware('auth');