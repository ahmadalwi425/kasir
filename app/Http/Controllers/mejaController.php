<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meja;
use validator;

class mejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meja=meja::all();
        return view('meja.index',compact('meja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meja.create');
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
            'no_meja'=>'required|numeric|unique:meja',
            'status_meja'=>'required|string|max:50',
        ]);
        try{
            meja::create([
                'no_meja'=>$request['no_meja'],
                'status_meja'=>$request['status_meja'],
            ]);
        }catch(\Exception $e){
            return redirect('meja')->witherrors('Data meja Gagal Di Tambahkan');
        }
        return redirect('meja')->with('status','Data meja Berhasil Di Tambahkan');
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
        $meja=meja::find($id);
        return view('meja.edit',compact('meja'));
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
        
        $this->validate($request,[
            'no_meja'=>'required|numeric',
            'status_meja'=>'required|string|max:50',
        ]);
        $meja=meja::find($id);
        try{
            $meja->update([
                'no_meja'=>$request['no_meja'],
                'status_meja'=>$request['status_meja'],
            ]);
        }catch(\Exception $e){
            return redirect('meja')->witherrors('Data meja Gagal Di Perbarui');
        }
        return redirect('meja')->with('status','Data meja Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meja=meja::find($id);
        try{
            $meja->delete();
        }catch(\Exception $e){
            return redirect('meja')->witherrors('Data meja Gagal Di Hapus');
        }
        return redirect('meja')->with('status','Data meja Berhasil Di Hapus');
    }
}
