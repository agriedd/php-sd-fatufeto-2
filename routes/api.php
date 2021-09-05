<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){

    Route::group(['prefix' => 'user'], function(){
        /**
         * authentikasi
         * 
         */
        Route::post('authorize', 'api\v1\UserController@authorization');
    });

    
    Route::group(['prefix' => '/pimpinan', 'middleware' => ['auth:api_pimpinan']], function(){
        Route::group(['prefix' => 'user'], function(){
            /**
             * authentikasi
             * 
             */
            Route::post('authorize', 'api\v1\UserController@authorization');
        });
    });
    Route::group(['prefix' => '/guru', 'middleware' => ['auth:api_guru']], function(){
        Route::group(['prefix' => 'user'], function(){
            /**
             * authentikasi
             * 
             */
            Route::post('authorize', 'api\v1\UserController@authorization');
        });
        Route::resource('jadwal', 'api\v1\JadwalController');
        Route::resource('kelas', 'api\v1\KelasController');
        Route::resource('siswa', 'api\v1\SiswaController');
        Route::resource('kegiatan', 'api\v1\KegiatanController');
        Route::resource('guru', 'api\v1\GuruController');
    });

    Route::resource('sekolah', 'api\v1\SekolahController');
    Route::put('guru/reset/{guru}', 'api\v1\GuruController@reset');
    Route::resource('guru', 'api\v1\GuruController');
    Route::resource('prasarana', 'api\v1\PrasaranaController');
    Route::resource('sarana', 'api\v1\SaranaController');
    Route::resource('jadwal', 'api\v1\JadwalController');
    Route::resource('kelas', 'api\v1\KelasController');
    Route::resource('siswa', 'api\v1\SiswaController');
    Route::put('pimpinan/reset/{pimpinan}', 'api\v1\PimpinanController@reset');
    Route::resource('pimpinan', 'api\v1\PimpinanController');
    Route::resource('berita', 'api\v1\BeritaController');
    Route::resource('kegiatan', 'api\v1\KegiatanController');
    Route::resource('kategori', 'api\v1\KategoriController');
    Route::resource('kegiatan.gambar', 'api\v1\GambarKegiatanController');


});
