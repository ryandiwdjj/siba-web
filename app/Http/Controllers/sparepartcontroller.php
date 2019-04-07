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
        $spareparts = Sparepart::all();

        return response()->json($spareparts, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $success = $sparepart->save();

        if (!$success) {
            return response()->json('Error Saving', 500);
        } else {
            return response()->json('Success', 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByName($nama_sparepart)
    {
        //return sparepart::where('nama_sparepart', $nama_sparepart)->first();

        $result = Sparepart::where('nama_sparepart', 'like', "%".$nama_sparepart."%")->get();

        if (is_null($result)) {
            return response()->json('Not Found', 404);
        } else
            return response()->json($result, 200);
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
    public function update(Request $request, $id)
    {
        $sparepart = Sparepart::where('id', $id)->first();

        if (is_null($sparepart)) {
            return response()->json('Sparepart not found', 404);
        }

        else {
            $sparepart->kode_sparepart = $request->kode_sparepart;
            $sparepart->nama_sparepart = $request->nama_sparepart;
            $sparepart->merk_sparepart = $request->merk_sparepart;
            $sparepart->tipe_sparepart = $request->tipe_sparepart;
            $sparepart->gambar_sparepart = $request->gambar_sparepart;
            $sparepart->jumlah_stok_sparepart = $request->jumlah_stok_sparepart;
            $sparepart->harga_beli_sparepart = $request->harga_beli_sparepart;
            $sparepart->harga_jual_sparepart = $request->harga_jual_sparepart;
            $sparepart->jumlah_minimal = $request->jumlah_minimal;

            $success = $sparepart->save();

            if (!$success) {
                return response()->json('Error Updating', 500);
            } else {
                return response()->json('Success Updating', 200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparepart = Sparepart::find($id);

        if(is_null($sparepart)) {
            return response()->json('Sparepart Not Found', 404);
        }
        
        else {
            $success = $sparepart->delete();
            if($success)
                return response()->json('Success Delete', 204);
            else {
                return response()->json('Error Delete', 500);
            }
        }
    }
}
