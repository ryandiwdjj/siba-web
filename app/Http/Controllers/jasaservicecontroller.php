<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jasa_service;

class jasaservicecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return jasa_service::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $jasa = new jasa_service;
        $jasa->nama_jasa = $request->nama_jasa;
        $jasa->harga_jasa = $request->harga_jasa;
        $jasa->save();

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
    public function show($nama_jasa)
    {
        return jasa_service::where('nama_jasa', $nama_jasa)->first();
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
    public function update(Request $request, $id_jasa)
    {
        $nama_jasa = $request->nama_jasa;
        $harga_jasa = $request->harga_jasa;

        $jasa = jasa_service::find($id_jasa);
        $jasa->nama_jasa = $nama_jasa;
        $jasa->harga_jasa = $harga_jasa;
        $jasa->save();

        return "Berhasil Mengubah Data";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jasa)
    {
        $jasa = jasa_service::find($id_jasa);
        $jasa->delete();

        return "Berhasil Menghapus Data";
    }
}
