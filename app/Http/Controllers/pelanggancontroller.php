<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggan;

class pelanggancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return pelanggan::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pelanggan = new pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $pelanggan->no_telp_pelanggan = $request->no_telp_pelanggan;
        $pelanggan->save();

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
    public function show($no_telp_pelanggan)
    {
        return pelanggan::where('no_telp_pelanggan', $no_telp_pelanggan)->first();
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
    public function update(Request $request, $id_pelanggan)
    {
        $nama_pelanggan = $request->nama_pelanggan;
        $alamat_pelanggan = $request->alamat_pelanggan;
        $no_telp_pelanggan = $request->no_telp_pelanggan;

        $pelanggan = pelanggan::find($id_pelanggan);
        $pelanggan->nama_pelanggan = $nama_pelanggan;
        $pelanggan->alamat_pelanggan = $alamat_pelanggan;
        $pelanggan->no_telp_pelanggan = $no_telp_pelanggan;
        $pelanggan->save();

        return "Berhasil Mengubah Data";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelanggan)
    {
        $pelanggan = pelanggan::find($id_pelanggan);
        $pelanggan->delete();

        return "Berhasil Menghapus Data";
    }
}
