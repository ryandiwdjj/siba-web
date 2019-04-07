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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, enctype');
header('Access-Control-Allow-Methods: GET, PATCH, POST, DELETE');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/jasa_service','jasaservicecontroller@index');
Route::get('/jasa_service/showByName/{nama_jasa}','jasaservicecontroller@showByName');
Route::post('/jasa_service/store','jasaservicecontroller@store');
Route::put('/jasa_service/update/{id}','jasaservicecontroller@update');
Route::delete('/jasa_service/{id}','jasaservicecontroller@destroy');

// Route::get('role','rolecontroller@index');
// Route::get('/role/{nama_role}','rolecontroller@show');
// Route::post('role','rolecontroller@create');
// Route::put('/role/{id_role}','rolecontroller@update');
// Route::delete('/role/{id_role}','rolecontroller@destroy');

Route::get('/pegawai','pegawaicontroller@index');
Route::get('/pegawai/showByName/{nama_pegawai}','pegawaicontroller@showByName');
Route::post('/pegawai/store','pegawaicontroller@store');
Route::put('/pegawai/update/{id}','pegawaicontroller@update');
Route::delete('/pegawai/{id}','pegawaicontroller@destroy');

// Route::get('cabang','cabangcontroller@index');
// Route::get('/cabang/{nama_cabang}','cabangcontroller@show');
// Route::post('cabang','cabangcontroller@create');
// Route::put('/cabang/{id_cabang}','cabangcontroller@update');
// Route::delete('/cabang/{id_cabang}','cabangcontroller@destroy');

Route::get('/suppliers','suppliercontroller@index');
Route::get('/supplier/showByName/{nama_supplier}','suppliercontroller@showByName');
Route::post('/supplier/store','suppliercontroller@store');
Route::put('/supplier/update/{id}','suppliercontroller@update');
Route::delete('/supplier/{id}','suppliercontroller@destroy');

Route::get('spareparts','sparepartcontroller@index');
Route::get('/sparepart/{nama_sparepart}','sparepartcontroller@show');
Route::post('sparepart/store','sparepartcontroller@store');
Route::put('/sparepart/update/{id_sparepart}','sparepartcontroller@update');
Route::delete('/sparepart/{id_sparepart}','sparepartcontroller@destroy');

// Route::get('pelanggan','pelanggancontroller@index');
// Route::get('/pelanggan/{no_telp_pelanggan}','pelanggancontroller@show');
// Route::post('pelanggan','pelanggancontroller@create');
// Route::put('/pelanggan/{id_pelanggan}','pelanggancontroller@update');
// Route::delete('/pelanggan/{id_pelanggan}','pelanggancontroller@destroy');

// Route::get('kendaraan','kendaraancontroller@index');
// Route::get('/kendaraan/{merk_kendaraan}','kendaraancontroller@show');
// Route::post('kendaraan','kendaraancontroller@create');
// Route::put('/kendaraan/{id_kendaraan}','kendaraancontroller@update');
// Route::delete('/kendaraan/{id_kendaraan}','kendaraancontroller@destroy');