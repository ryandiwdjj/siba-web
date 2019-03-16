<?php

use Illuminate\Http\Request;

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

Route::get('jasa_service','jasaservicecontroller@index');
Route::get('/jasa_service/{nama_jasa}','jasaservicecontroller@show');
Route::post('jasa_service','jasaservicecontroller@create');
Route::put('/jasa_service/{id_jasa}','jasaservicecontroller@update');
Route::delete('/jasa_service/{id_jasa}','jasaservicecontroller@destroy');

Route::get('role','rolecontroller@index');
Route::get('/role/{nama_role}','rolecontroller@show');
Route::post('role','rolecontroller@create');
Route::put('/role/{id_role}','rolecontroller@update');
Route::delete('/role/{id_role}','rolecontroller@destroy');

Route::get('pegawai','pegawaicontroller@index');
Route::get('/pegawai/{nama_pegawai}','pegawaicontroller@show');
Route::post('pegawai','pegawaicontroller@create');
Route::put('/pegawai/{id_pegawai}','pegawaicontroller@update');
Route::delete('/pegawai/{id_pegawai}','pegawaicontroller@destroy');

Route::get('cabang','cabangcontroller@index');
Route::get('/cabang/{nama_cabang}','cabangcontroller@show');
Route::post('cabang','cabangcontroller@create');
Route::put('/cabang/{id_cabang}','cabangcontroller@update');
Route::delete('/cabang/{id_cabang}','cabangcontroller@destroy');

Route::get('supplier','suppliercontroller@index');
Route::get('/supplier/{nama_supplier}','suppliercontroller@show');
Route::post('supplier','suppliercontroller@create');
Route::put('/supplier/{id_supplier}','suppliercontroller@update');
Route::delete('/supplier/{id_supplier}','suppliercontroller@destroy');

Route::get('sparepart','sparepartcontroller@index');
Route::get('/sparepart/{nama_sparepart}','sparepartcontroller@show');
Route::post('sparepart','sparepartcontroller@create');
Route::put('/sparepart/{id_sparepart}','sparepartcontroller@update');
Route::delete('/sparepart/{id_sparepart}','sparepartcontroller@destroy');

Route::get('pelanggan','pelanggancontroller@index');
Route::get('/pelanggan/{no_telp_pelanggan}','pelanggancontroller@show');
Route::post('pelanggan','pelanggancontroller@create');
Route::put('/pelanggan/{id_pelanggan}','pelanggancontroller@update');
Route::delete('/pelanggan/{id_pelanggan}','pelanggancontroller@destroy');

Route::get('kendaraan','kendaraancontroller@index');
Route::get('/kendaraan/{merk_kendaraan}','kendaraancontroller@show');
Route::post('kendaraan','kendaraancontroller@create');
Route::put('/kendaraan/{id_kendaraan}','kendaraancontroller@update');
Route::delete('/kendaraan/{id_kendaraan}','kendaraancontroller@destroy');