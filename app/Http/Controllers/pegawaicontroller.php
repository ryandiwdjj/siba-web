<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;

class pegawaicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return pegawai::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pegawai = new pegawai;
        $pegawai->id_role = $request->id_role;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->alamat_pegawai = $request->alamat_pegawai;
        $pegawai->no_telp_pegawai = $request->no_telp_pegawai;
        $pegawai->gaji_perminggu = $request->gaji_perminggu;
        $pegawai->password_pegawai = $request->password_pegawai;
        $pegawai->id_cabang = $request->id_cabang;
        $pegawai->save();

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
    public function show($nama_pegawai)
    {
        return pegawai::where('nama_pegawai', $nama_pegawai)->first();
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
    public function update(Request $request, $id_pegawai)
    {
        $id_role = $request->id_role;
        $nama_pegawai = $request->nama_pegawai;
        $alamat_pegawai = $request->alamat_pegawai;
        $no_telp_pegawai = $request->no_telp_pegawai;
        $gaji_perminggu = $request->gaji_perminggu;
        $password_pegawai = $request->password_pegawai;
        $id_cabang = $request->id_cabang;


        $pegawai = pegawai::find($id_pegawai);
        $pegawai->id_role = $id_role;
        $pegawai->nama_pegawai = $nama_pegawai;
        $pegawai->alamat_pegawai = $alamat_pegawai;
        $pegawai->no_telp_pegawai = $no_telp_pegawai;
        $pegawai->gaji_perminggu = $gaji_perminggu;
        $pegawai->password_pegawai = $password_pegawai;
        $pegawai->id_cabang = $id_cabang;
        $pegawai->save();

        return "Berhasil Mengubah Data";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai)
    {
        $pegawai = pegawai::find($id_pegawai);
        $pegawai->delete();

        return "Berhasil Menghapus Data";
    }
}
