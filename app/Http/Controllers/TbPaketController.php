<?php

namespace App\Http\Controllers;

use App\Models\tb_paket;
use Illuminate\Http\Request;

class TbPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_paket::all();
        return view('paket.index', compact('data'));
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
        $data = new tb_paket;
        $data->jenis = $request->jenis;
        $data->nama_paket = $request->nama_paket;
        $data->harga = $request->harga;    
        $data->save();

        return redirect('/paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function show(tb_paket $tb_paket, $id)
    {
        $data = $tb_paket::find($id);
        return view('paket.index', compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_paket $tb_paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_paket $tb_paket)
    {
        tb_paket::findOrFail($request->id)->update($request->all());    
        
        return redirect('/paket')->with('update', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tb_paket::find($id);
        $data->delete();
        return redirect('/paket');
    }
}
