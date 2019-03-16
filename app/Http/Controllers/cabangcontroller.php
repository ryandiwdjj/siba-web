<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cabang;

class cabangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return cabang::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cabang = new cabang;
        $cabang->nama_cabang = $request->nama_cabang;
        $cabang->alamat_cabang = $request->alamat_cabang;
        $cabang->no_telp_cabang = $request->no_telp_cabang;
        $cabang->save();

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
    public function show($nama_cabang)
    {
        return cabang::where('nama_cabang', $nama_cabang)->first();
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
    public function update(Request $request, $id_cabang)
    {
        $nama_cabang = $request->nama_cabang;
        $alamat_cabang = $request->alamat_cabang;
        $no_telp_cabang = $request->no_telp_cabang;

        $cabang = cabang::find($id_cabang);
        $cabang->nama_cabang = $nama_cabang;
        $cabang->alamat_cabang = $alamat_cabang;
        $cabang->no_telp_cabang = $no_telp_cabang;
        $cabang->save();

        return "Berhasil Mengubah Data";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cabang)
    {
        $cabang = cabang::find($id_cabang);
        $cabang->delete();

        return "Berhasil Menghapus Data";
    }
}
