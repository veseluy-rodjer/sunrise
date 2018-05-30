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

Route::get('/inviteBoss/update/{email}/{key}', 'InviteBossController@update')->name('inviteBoss.update');

Route::resource('/inviteBoss', 'InviteBossController');

Auth::routes();

Route::get('register', function(){
    return response('Только через почту!');
})->name('register');    

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/', 'ColleagueController', ['parameters' => ['' => 'colleague']]);

Route::get('/{colleague}', 'ColleagueController@indexOrder')->name('indexOrder');
