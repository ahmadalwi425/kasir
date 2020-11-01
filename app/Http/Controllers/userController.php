<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\level;
use validator;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=user::all();
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level=level::all();
        return view('user.create',compact('level'));
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
            'username'=>'required|string|max:50|unique:users',
            'password'=>'required|string|max:50',
            'nama_user'=>'required|string|max:50',
            'id_level'=>'required|numeric',
        ]);
        try{
            user::create([
                'username'=>$request['username'],
                'password'=>bcrypt($request['password']),
                'nama_user'=>$request['nama_user'],
                'id_level'=>$request['id_level'],
            ]);
        }catch(\Exception $e){
            return redirect('user')->witherrors('Data User Gagal Di Tambahkan');
        }
        return redirect('user')->with('status','Data User Berhasil Di Tambahkan');
    }


    public function store2(Request $request)
    {
        $this->validate($request,[
            'username'=>'required|string|max:50|unique:users',
            'password'=>'required|string|max:50',
            'nama_user'=>'required|string|max:50',
        ]);
        $level='5';
            user::create([
                'username'=>$request['username'],
                'password'=>bcrypt($request['password']),
                'nama_user'=>$request['nama_user'],
                'id_level'=>$level,
            ]);
        return redirect('login');
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
        $level=level::all();
        $user=user::find($id);
        return view('user.edit',compact('level','user'));
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
        $user=user::find($id);
        $this->validate($request,[
            'username'=>'required|string|max:50',
            'nama_user'=>'required|string|max:50',
            'id_level'=>'required|numeric',
        ]);
        try{
            $user->update([
                'username'=>$request['username'],
                'nama_user'=>$request['nama_user'],
                'id_level'=>$request['id_level'],
            ]);
        }catch(\Exception $e){
            return redirect('user')->witherrors('Data User Gagal Di Perbarui');
        }
        return redirect('user')->with('status','Data User Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=user::find($id);
        try{
            $user->delete();
        }catch(\Exception $e){
            return redirect('user')->witherrors('Data User Gagal Di Hapus');
        }
        return redirect('user')->with('status','Data User Berhasil Di Hapus');
    }
}
