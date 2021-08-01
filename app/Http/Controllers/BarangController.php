<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('pegawai.barang.index',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.barang.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Barang::create([
            'id_barang'=>$request->id_barang,
            'nama_menu'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
        ]);
        return redirect()->route('barang.index')->with('pesan','Barang Berhasil DiTambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        return view('pegawai.barang.edit',compact('barang'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
         Barang::where('id_barang',$barang->id_barang)
        ->update([
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
        ]);
        return redirect()->route('barang.index')->with('pesan','Barang Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
         $barang->delete();
        return redirect()->route('barang.index')->with('pesan','barang Berhasil DiHapus');
    }
}
