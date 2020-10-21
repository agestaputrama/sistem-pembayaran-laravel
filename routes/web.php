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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bendahara', 'BendaharaController@index')->middleware('bendahara');
Route::get('/data-mahasiswa', 'BendaharaController@mahasiswa')->middleware('bendahara');
Route::get('/data-tagihan', 'BendaharaController@tagihan')->middleware('bendahara');
Route::post('/data-tagihan', 'BendaharaController@store')->middleware('bendahara');

Route::get('/mahasiswa', 'MahasiswaController@index')->middleware('mahasiswa');
Route::get('/profil', 'MahasiswaController@profil')->middleware('mahasiswa');
Route::get('/tagihan-saya', 'MahasiswaController@tagihan')->middleware('mahasiswa');
Route::get('/tagihan-saya/{id}/pembayaran', 'MahasiswaController@pembayaran')->middleware('mahasiswa');


Route::get('/pimpinan', 'PimpinanController@index')->middleware('pimpinan');
Route::get('/tagihan-mahasiswa', 'PimpinanController@tagihan')->middleware('pimpinan');
Route::get('/laporan', 'PimpinanController@laporan')->middleware('pimpinan');
