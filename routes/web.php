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

Route::get('/', 'PublicController@index')->name('index'); // トップページ
Route::get('post/{id}', 'PublicController@singlePost')->name('singlePost'); // 投稿ページ
Route::get('about', 'PublicController@about')->name('about'); // Aboutページ

Route::get('contact', 'PublicController@contact')->name('contact'); // Contactページ GET
Route::post('contact', 'PublicController@contactPost')->name('contactPost'); // Contactページ POST

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@dashboard')->name('adminDashboard');
});
