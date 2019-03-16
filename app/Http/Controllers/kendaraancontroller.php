<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kendaraan;

class kendaraancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return kendaraan::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kendaraan = new kendaraan;
        $kendaraan->merk_kendaraan = $request->merk_kendaraan;
        $kendaraan->tipe_kendaraan = $request->tipe_kendaraan;
        $kendaraan->save();

        return "Berhasil Menambahkan Data";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($merk_kendaraan)
    {
        return kendaraan::where('merk_kendaraan', $merk_kendaraan)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kendaraan)
    {
        $merk_kendaraan = $request->merk_kendaraan;
        $tipe_kendaraan = $request->tipe_kendaraan;

        $kendaraan = kendaraan::find($id_kendaraan);
        $kendaraan->merk_kendaraan = $merk_kendaraan;
        $kendaraan->tipe_kendaraan = $tipe_kendaraan;
        $kendaraan->save();

        return "Berhasil Mengubah Data";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kendaraan)
    {
        $kendaraan = kendaraan::find($id_kendaraan);
        $kendaraan->delete();

        return "Berhasil Menghapus Data";
    }
}
