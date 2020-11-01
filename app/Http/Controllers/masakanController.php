<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\masakan;
use validator;

class masakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masakan=masakan::all();
        return view('masakan.index',compact('masakan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_masakan'=>'required|string|max:50|unique:masakan',
            'harga'=>'required|numeric',
            'status_masakan'=>'required|string|max:50',
            'foto'=>'required|file|image|mimes:jpeg,png,gif,webp',
        ]);
        $upload=$request->file('foto')->store('upload');
        try{
            masakan::create([
                'nama_masakan'=>$request['nama_masakan'],
                'harga'=>$request['harga'],
                'status_masakan'=>$request['status_masakan'],
                'foto'=>$upload,
            ]);
        }catch(\Exception $e){
            return redirect('masakan')->witherrors('Data masakan Gagal Di Tambahkan');
        }
        return redirect('masakan')->with('status','Data masakan Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masakan=masakan::find($id);
        return view('masakan.edit',compact('masakan'));
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
        $masakan=masakan::find($id);
        $this->validate($request,[
            'nama_masakan'=>'required|string|max:50',
            'harga'=>'required|numeric',
            'status_masakan'=>'required|string|max:50',
            'foto'=>'required|file|image|mimes:jpeg,png,gif,webp',
        ]);
        $upload=$request->file('foto')->store('upload');
        try{
            $masakan->update([
                'nama_masakan'=>$request['nama_masakan'],
                'harga'=>$request['harga'],
                'status_masakan'=>$request['status_masakan'],
                'foto'=>$upload,
            ]);
        }catch(\Exception $e){
            return redirect('masakan')->witherrors('Data masakan Gagal Di Perbarui');
        }
        return redirect('masakan')->with('status','Data masakan Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masakan=masakan::find($id);
        try{
            $masakan->delete();
        }catch(\Exception $e){
            return redirect('masakan')->witherrors('Data masakan Gagal Di Hapus');
        }
        return redirect('masakan')->with('status','Data masakan Berhasil Di Hapus');
    }
}
