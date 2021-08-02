<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use App\Models\barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $penjualans =penjualan::all();
        return view('pegawai.penjualan.index',compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang= barang::all();
        return view('pegawai.penjualan.form',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //fuck website
        $penjualan= penjualan::create($request->all());
        $barangs=$request->input('barang',[]);
        $jumlah = $request->input('jumlah', []);
        $total=0;
        //fucking for
        for ($barang=0; $barang < count($barangs); $barang++) {
        if ($barangs[$barang] != '') {
            $penjualan->barang()->attach($barangs[$barang], ['jumlah' => $jumlah[$barang]]);
        }
    }  
         //fuck variable
        $update=penjualan::where('id_penjualan',$request->id_penjualan)->get();
        $kurangiBarang = new barang;
        foreach($penjualan->barang as $brg)
        {
            $biaya=($brg->harga)*($brg->pivot->jumlah);
            $total=$total+$biaya;
            $kurangiBarang->kurangiStok($brg->id_barang,$brg->pivot->jumlah);
        }
            $update=penjualan::where('id_penjualan',$request->id_penjualan)
        ->update([
            'jumlah_pembayaran'=>$total]);
            return redirect()->route('penjualan.show',[$request->id_penjualan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(penjualan $penjualan)
    {
       $barang=barang::all();
        return view('pegawai.penjualan.lihat',compact('penjualan','barang'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualan $penjualan)
    {
        //
    }
}
