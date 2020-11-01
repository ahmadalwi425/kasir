<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\masakan;
use App\order;
use App\detail;

class detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $order=order::find($id);
        $masakan=masakan::all();
        $detail2=detail::all();
        $detail=$detail2->where('id_order',$id);
        $jumlah=$detail->count();
        return view('detail.index',compact('order','masakan'),compact('detail','jumlah'));
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
    public function store(Request $request,$id)
    {
        detail::create([
            'id_order'=>$request['id_order'],
            'id_masakan'=>$request['id_masakan'],
            'harga'=>$request['harga'],
            'status_detail'=>$request['status_detail'],
        ]);
        $order=order::find($id);
        $masakan=masakan::all();
        $detail2=detail::all();
        $detail=$detail2->where('id_order',$id);
        $jumlah=$detail->count();
        return view('detail.index',compact('order','masakan'),compact('detail','jumlah'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$id_order)
    {
        $detail=detail::find($id);
        $detail->update([
            'status_detail'=>$request['status_detail'],
        ]);
        $order=order::find($id_order);
        $masakan=masakan::all();
        $detail2=detail::all();
        $detail=$detail2->where('id_order',$id_order);
        $jumlah=$detail->count();
        return view('detail.index',compact('order','masakan'),compact('detail','jumlah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $detail3=detail::find($id);
        $detail3->delete();
        $id_order=$request['id_order'];
        $order=order::find($id_order);
        $masakan=masakan::all();
        $detail2=detail::all();
        $detail=$detail2->where('id_order',$id_order);
        $jumlah=$detail->count();
        return view('detail.index',compact('order','masakan'),compact('detail','jumlah'));
    }
}
