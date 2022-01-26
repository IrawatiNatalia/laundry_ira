<?php

namespace App\Http\Controllers;

use App\Models\tb_outlet;
use Illuminate\Http\Request;

class TbOutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_outlet::all();
        return view('outlet.index', compact('data'));
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
        $data = new tb_outlet;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;    
        $data->save();

        return redirect('/outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_outlet  $tb_outlet
     * @return \Illuminate\Http\Response
     */
    public function show(tb_outlet $tb_outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_outlet  $tb_outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_outlet $tb_outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_outlet  $tb_outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_outlet $tb_outlet)
    {
        $data = tb_outlet::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;    
        $data->save();

        return redirect('/outlet')->with('update', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_outlet  $tb_outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tb_outlet::find($id);
        $data->delete();
        return redirect('/outlet');
    }
}
