<?php

namespace App\Http\Controllers;

use App\Models\tb_member;
use Illuminate\Http\Request;

class TbMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_member::all();
        return view('member.index', compact('data'));
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
        $data = New tb_member;
        $data->nama = $request->nama;    
        $data->alamat = $request->alamat;    
        $data->jenis_kelamin = $request->jenis_kelamin;    
        $data->tlp = $request->tlp;     
        $data->save();
        
        return redirect('/member');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function show(tb_member $tb_member, $id)
    {
        $data = $tb_member::find($id);
        return view('member.index', compact('data'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_member $tb_member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_member $tb_member)
    {
        tb_member::findOrFail($request->id)->update($request->all());    
        
        return redirect('/member')->with('update', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tb_member::find($id);
        $data->delete();
        return redirect('/member');
    }
}
