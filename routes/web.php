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

Route::view('/','welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//引入admin后台web路由文件
include __DIR__.'/admin/web.php';

//学习队列用
Route::get('trade','Admin\TradeController@trade');













