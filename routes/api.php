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

    Route::resource('sekolah', 'api\v1\SekolahController');
    Route::resource('guru', 'api\v1\GuruController');
    Route::resource('prasarana', 'api\v1\PrasaranaController');
    Route::resource('sarana', 'api\v1\SaranaController');
    Route::resource('jadwal', 'api\v1\JadwalController');
    Route::resource('kelas', 'api\v1\KelasController');
    Route::resource('siswa', 'api\v1\SiswaController');
});
