<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier;

class suppliercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return supplier::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $supllier = new supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->sales_supplier = $request->sales_supplier;
        $supplier->no_telp_supplier = $request->no_telp_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->save();

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
    public function show($nama_supplier)
    {
        return supplier::where('nama_supplier', $nama_supplier)->first();
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
    public function update(Request $request, $id_supplier)
    {
        $nama_supplier = $request->nama_supplier;
        $sales_supplier = $request->sales_supplier;
        $no_telp_supplier = $request->no_telp_supplier;
        $alamat_supplier = $request->alamat_supplier;

        $supplier = supplier::find($id_supplier);
        $supplier->nama_supplier = $nama_supplier;
        $supplier->sales_supplier = $sales_supplier;
        $supplier->no_telp_supplier = $no_telp_supplier;
        $supplier->alamat_supplier = $alamat_supplier;
        $supplier->save();

        return "Berhasil Mengubah Data";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_supplier)
    {
        $supplier = supplier::find($id_supplier);
        $supplier->delete();

        return "Berhasil Menghapus Data";
    }
}
