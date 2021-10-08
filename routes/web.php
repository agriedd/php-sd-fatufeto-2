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
    Route::get('/guru/{guru}', 'HomeController@guruInfo')->name('home.guru.show');
    Route::get('/siswa', 'HomeController@siswa')->name('home.siswa');
    Route::get('/kelas', 'HomeController@kelas')->name('home.kelas');
    Route::get('/kegiatan/show', 'HomeController@kegiatanShow')->name('home.kegiatan.show');
    Route::get('/sarana', 'HomeController@sarana')->name('home.sarana');
    Route::get('/jadwal', 'HomeController@jadwal')->name('home.jadwal');
    Route::get('/prasarana', 'HomeController@prasarana')->name('home.prasarana');
    Route::get('/kegiatan', 'HomeController@kegiatan')->name('home.kegiatan');
    Route::get('/pengumuman/{pengumuman}', 'HomeController@pengumumanInfo')->name('home.pengumuman.info');
    Route::get('/search', 'HomeController@search')->name('home.search');
});
Route::group(["prefix"=>"/admin", "middleware"=>"auth:web"], function(){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/{any}', 'AdminController@index')->where('any', '.*');
});
Route::group(["prefix"=>"/u/guru", "middleware"=>"auth:guru"], function(){
    Route::get('/', 'GuruController@index')->name('guru');
    Route::get('/{any}', 'GuruController@index')->where('any', '.*');
});
Route::group(["prefix"=>"/u/pimpinan", "middleware"=>"auth:pimpinan"], function(){
    Route::get('/', 'PimpinanController@index')->name('pimpinan');
    Route::get('/{any}', 'PimpinanController@index')->where('any', '.*');
});
Route::group(["prefix"=>"/print"], function(){
    Route::group(["prefix"=>"/rekap", ], function(){
        Route::get('/siswa', 'prints\RekapController@siswa');
        Route::get('/guru', 'prints\RekapController@guru');
        Route::get('/jadwal', 'prints\RekapController@jadwal');
    });
});

/**
 * hanya membolehkan login
 * 
 */
Auth::routes([
    'register' => false
]);
Route::post('login/guru', 'AuthGuru\LoginController@login')->name('login.guru');
Route::post('login/pimpinan', 'AuthPimpinan\LoginController@login')->name('login.pimpinan');