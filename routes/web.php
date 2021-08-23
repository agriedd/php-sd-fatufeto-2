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
    Route::get('/kelas', 'HomeController@kelas')->name('home.kelas');
    Route::get('/kegiatan/show', 'HomeController@kegiatanShow')->name('home.kegiatan.show');
    Route::get('/sarana', 'HomeController@sarana')->name('home.sarana');
    Route::get('/prasarana', 'HomeController@prasarana')->name('home.prasarana');
    Route::get('/kegiatan', 'HomeController@kegiatan')->name('home.kegiatan');
    Route::get('/pengumuman/{pengumuman}', 'HomeController@pengumumanInfo')->name('home.pengumuman.info');
});
Route::group(["prefix"=>"/admin", "middleware"=>"auth:web"], function(){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/{any}', 'AdminController@index')->where('any', '.*');
});
Route::group(["prefix"=>"/print"], function(){
    Route::group(["prefix"=>"/rekap", "middleware"=>"auth:web"], function(){
        Route::get('/siswa', 'prints\RekapController@siswa');
        Route::get('/guru', 'prints\RekapController@guru');
    });
});

/**
 * hanya membolehkan login
 * 
 */
Auth::routes([
    'register' => false
]);
