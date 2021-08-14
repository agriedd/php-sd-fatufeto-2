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

Route::group(["prefix"=>"/"], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profil', 'HomeController@profil')->name('home.profil');
    Route::get('/guru', 'HomeController@guru')->name('home.guru');
    Route::get('/siswa', 'HomeController@siswa')->name('home.siswa');
    Route::get('/pengumuman/{pengumuman}', 'HomeController@pengumumanInfo')->name('home.pengumuman.info');
});
Route::group(["prefix"=>"/admin", "middleware"=>"auth:web"], function(){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/{any}', 'AdminController@index')->where('any', '.*');
});

/**
 * hanya membolehkan login
 * 
 */
Auth::routes([
    'register' => false
]);
