<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\meja;
use App\user;
use validator;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=order::all();
        return view('order.index',compact('order'));
    }
    public function index2($id)
    {
        $order2=order::all();
        $order=$order2->where('id_user',$id);
        $status='Belum Selesai';
        $htg=$order->where('status_order',$status);
        $jumlah=$htg->count();
        return view('order.index',compact('order'),compact('jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meja2=meja::all();
        $st='Tersedia';
        $meja=$meja2->where('status_meja',$st);
        $user=user::all();
        return view('order.create',compact('meja','user'));
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
            'id_meja'=>'required|string|max:50',
            'tanggal'=>'required',
            'id_user'=>'required|numeric',
            'keterangan'=>'required|string|max:50',
            'status_order'=>'required|string|max:50',
        ]);
        $id_meja=$request['id_meja'];
        $meja=meja::find($id_meja);
        $meja->update([
            'status_meja'=>$request['status_meja'],
        ]);
        try{
            order::create([
            'id_meja'=>$request['id_meja'],
            'tanggal'=>$request['tanggal'],
            'id_user'=>$request['id_user'],
            'keterangan'=>$request['keterangan'],
            'status_order'=>$request['status_order'],
            ]);
        }catch(\Exception $e){
            return redirect('order')->witherrors('Data order Gagal Di Tambahkan');
        }
        return redirect('order')->with('status','Data order Berhasil Di Tambahkan');
    }

    public function store2(Request $request, $id)
    {
        $this->validate($request,[
            'id_meja'=>'required|string|max:50',
            'tanggal'=>'required',
            'id_user'=>'required|numeric',
            'keterangan'=>'required|string|max:50',
            'status_order'=>'required|string|max:50',
        ]);
        $id_meja=$request['id_meja'];
        $meja=meja::find($id_meja);
        $meja->update([
            'status_meja'=>$request['status_meja'],
        ]);
        
        try{
            order::create([
            'id_meja'=>$request['id_meja'],
            'tanggal'=>$request['tanggal'],
            'id_user'=>$request['id_user'],
            'keterangan'=>$request['keterangan'],
            'status_order'=>$request['status_order'],
            ]);
            $order2=order::all();
            $order=$order2->where('id_user',$id);
            $status='Belum Selesai';
            $htg=$order->where('status_order',$status);
            $jumlah=$htg->count();
            
        }catch(\Exception $e){
            return view('order.index',compact('order','jumlah'))->witherrors('Data order Gagal Di Tambahkan');
        }
        return view('order.index',compact('order','jumlah'))->with('status','Data order Berhasil Di Tambahkan');
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
        $order=order::find($id);
        return view('order.edit',compact('order'));
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
        $order=order::find($id);
        $this->validate($request,[
            'keterangan'=>'required|string|max:50',
        ]);
        try{
            $order->update([
            'keterangan'=>$request['keterangan'],
            ]);
        }catch(\Exception $e){
            return redirect('order')->witherrors('Data order Gagal Di Perbarui');
        }
        return redirect('order')->with('status','Data order Berhasil Di Perbarui');
    }

    public function update2(Request $request, $id,$id_user)
    {
        $order=order::find($id);
        $this->validate($request,[
            'keterangan'=>'required|string|max:50',
        ]);
        try{
            $order->update([
            'keterangan'=>$request['keterangan'],
            ]);
            $order2=order::all();
            $order=$order2->where('id_user',$id_user);
            $status='Belum Selesai';
            $htg=$order->where('status_order',$status);
            $jumlah=$htg->count();
            
        }catch(\Exception $e){
            return view('order.index',compact('order','jumlah'))->witherrors('Data order Gagal Di Perbarui');
        }
        return view('order.index',compact('order','jumlah'))->with('status','Data order Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id_meja=$request['id_meja'];
        $meja=meja::find($id_meja);
        $meja->update([
            'status_meja'=>$request['status_meja'],
        ]);
        $order=order::find($id);

        try{
            $order->delete();
        }catch(\Exception $e){
            return redirect('order')->witherrors('Data order Gagal Di Hapus');
        }
        return redirect('order')->with('status','Data order Berhasil Di Hapus');
    }

    public function destroy2(Request $request,$id,$id_user)
    {
        $id_meja=$request['id_meja'];
        $meja=meja::find($id_meja);
        $meja->update([
            'status_meja'=>$request['status_meja'],
        ]);
        $order3=order::find($id);

        try{
            $order3->delete();
            $order2=order::all();
            $order=$order2->where('id_user',$id_user);
            $status='Belum Selesai';
            $htg=$order->where('status_order',$status);
            $jumlah=$htg->count();
        }catch(\Exception $e){
            return view('order.index',compact('order','jumlah'))->witherrors('Data order Gagal Di Hapus');
        }
        return view('order.index',compact('order','jumlah'))->with('status','Data order Berhasil Di Hapus');
    }
}
