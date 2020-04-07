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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/u', 'UserController',)->except([
    'create', 'store'
]);
Route::get('/u/{u}/pro', 'UserController@promote')->name('u.promote');
Route::get('/u/{u}/dem', 'UserController@demote')->name('u.demote');

Route::resource('/assets', 'AssetController');

Route::get('/lelang/create/{asset}', 'LelangController@create')->name('lelang.create');
Route::post('/lelang/{asset}', 'LelangController@store')->name('lelang.store');
Route::resource('/lelang', 'LelangController')->except([
    'create', 'store'
]);

Route::fallback('ErrorController@index');
