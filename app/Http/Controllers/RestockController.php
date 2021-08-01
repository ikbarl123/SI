<?php

namespace App\Http\Controllers;

use App\Models\restock;
use Illuminate\Http\Request;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restocks = restock::all();
        return view('pegawai.restock.index',compact('restocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\restock  $restock
     * @return \Illuminate\Http\Response
     */
    public function show(restock $restock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\restock  $restock
     * @return \Illuminate\Http\Response
     */
    public function edit(restock $restock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\restock  $restock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, restock $restock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restock  $restock
     * @return \Illuminate\Http\Response
     */
    public function destroy(restock $restock)
    {
        //
    }
}
