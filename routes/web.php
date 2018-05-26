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

Route::resource('/role', 'RoleController');

Route::resource('/sex', 'SexController');

Route::resource('/boss', 'BossController');

Route::resource('/rank', 'RankController');

Route::resource('/invite', 'InviteController');

Auth::routes();

Route::match(['get', 'head'], 'register', function(){
    return response('Только через почту!');
})->name('register');    

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/', 'ColleaguesController', ['parameters' => ['' => 'colleagues']]);

Route::get('/{colleagues}', 'ColleaguesController@indexOrder')->name('indexOrder');
