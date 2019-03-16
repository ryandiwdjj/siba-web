<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sparepart;

class sparepartcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return sparepart::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sparepart = new sparepart;
        $sparepart->kode_sparepart = $request->kode_sparepart;
        $sparepart->nama_sparepart = $request->nama_sparepart;
        $sparepart->merk_sparepart = $request->merk_sparepart;
        $sparepart->tipe_sparepart = $request->tipe_sparepart;
        $sparepart->gambar_sparepart = $request->gambar_sparepart;
        $sparepart->jumlah_stok_sparepart = $request->jumlah_stok_sparepart;
        $sparepart->harga_beli_sparepart = $request->harga_beli_sparepart;
        $sparepart->harga_jual_sparepart = $request->harga_jual_sparepart;
        $sparepart->jumlah_minimal = $request->jumlah_minimal;
        $sparepart->save();

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
    public function show($nama_sparepart)
    {
        return sparepart::where('nama_sparepart', $nama_sparepart)->first();
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
    public function update(Request $request, $id_sparepart)
    {
        $kode_sparepart = $request->kode_sparepart;
        $nama_sparepart = $request->nama_sparepart;
        $merk_sparepart = $request->merk_sparepart;
        $tipe_sparepart = $request->tipe_sparepart;
        $gambar_sparepart = $request->gambar_sparepart;
        $jumlah_stok_sparepart = $request->jumlah_stok_sparepart;
        $harga_beli_sparepart = $request->harga_beli_sparepart;
        $harga_jual_sparepart = $request->harga_jual_sparepart;
        $jumlah_minimal = $request->jumlah_minimal;

        $sparepart = sparepart::find($id_sparepart);
        $sparepart->kode_sparepart = $kode_sparepart;
        $sparepart->nama_sparepart = $nama_sparepart;
        $sparepart->merk_sparepart = $merk_sparepart;
        $sparepart->tipe_sparepart = $tipe_sparepart;
        $sparepart->gambar_sparepart = $gambar_sparepart;
        $sparepart->jumlah_stok_sparepart = $jumlah_stok_sparepart;
        $sparepart->harga_beli_sparepart = $harga_beli_sparepart;
        $sparepart->harga_jual_sparepart = $harga_jual_sparepart;
        $sparepart->jumlah_minimal = $jumlah_minimal;
        $sparepart->save();

        return "Berhasil Mengubah Data";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sparepart)
    {
        $sparepart = sparepart::find($id_sparepart);
        $sparepart->delete();

        return "Berhasil Menghapus Data";
    }
}
