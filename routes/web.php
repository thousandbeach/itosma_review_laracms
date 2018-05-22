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

Route::get('/', 'PublicController@index'); // トップページ
Route::get('post/{id}', 'PublicController@singlePost'); // 投稿ページ
Route::get('about', 'PublicController@about'); // Aboutページ

Route::get('contact', 'PublicController@contact'); // Contactページ GET
Route::post('contact', 'PublicController@contactPost'); // Contactページ POST
