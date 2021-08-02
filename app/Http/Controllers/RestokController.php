<?php

namespace App\Http\Controllers;

use App\Models\restok;
use App\Models\barang;
use Illuminate\Http\Request;


class restokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restoks = restok::all();
        return view('pegawai.restok.index',compact('restoks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang=barang::all();
        return view('pegawai.restok.form',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       restok::create([
            'id_restock'=>$request->id_restok,
            'id_barang'=>$request->id_barang,
            'nama_supplier'=>$request->nama_supplier,
            'tanggal'=>$request->tanggal,
            'total_pembayaran'=>$request->total_pembayaran,
            'jumlah'=>$request->jumlah,
            'username'=>$request->username,
        ]);
        $barang= new barang();
        $barang->tambahStok($request->id_barang,$request->jumlah);
        return redirect()->route('restok.index')->with('pesan','Data restok Berhasil DiTambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\restok  $restok
     * @return \Illuminate\Http\Response
     */
    public function show(restok $restok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\restok  $restok
     * @return \Illuminate\Http\Response
     */
    public function edit(restok $restok)
    {
        $barang=barang::all();
        return view('pegawai.restok.edit',compact('restok','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\restok  $restok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, restok $restok)
    {
        $barang= new barang();
        $barang->kurangiStok($restok->id_barang,$restok->jumlah);
        $update= new barang();
        $update->tambahStok($request->id_barang,$request->jumlah);
        restok::where('id_restok',$restok->id_restok)
        ->update([
            'nama_supplier'=>$request->nama_supplier,
            'tanggal'=>$request->tanggal,
            'total_pembayaran'=>$request->total_pembayaran,
            'jumlah'=>$request->jumlah,
        ]);
        
        return redirect()->route('restok.index')->with('pesan','Data Restok Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restok  $restok
     * @return \Illuminate\Http\Response
     */
    public function destroy(restok $restok)
    {
                 $barang= new barang();
                 $barang->kurangiStok($restok->id_barang,$restok->jumlah);
                 $restok->delete();
        return redirect()->route('restok.index')->with('pesan','restok Berhasil DiHapus');
    }
}
