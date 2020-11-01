<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\transaksi;
use App\order;
use App\meja;
use App\detail;
use PDF;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi=transaksi::all();
        return view('transaksi.index',compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $detail2=detail::all();
        $detail=$detail2->where('id_order',$id);
        $order=order::find($id);
        $total=$detail->sum('harga');
        return view('transaksi.create',compact('detail','order'),compact('total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        transaksi::create([
            'id_order'=>$request['id_order'],
            'id_user'=>$request['id_user'],
            'tanggal'=>$request['tanggal'],
            'total_bayar'=>$request['total_bayar']
        ]);
        $id_meja=$request['id_meja'];
        $id_order=$request['id_order'];
        $meja=meja::find($id_meja);
        $order=order::find($id_order);
        $meja->update([
            'status_meja'=>$request['status_meja'],
        ]);
        $order->update([
            'status_order'=>$request['status_order'],
        ]);
        $transaksi=transaksi::all();
        return view('transaksi.index',compact('transaksi'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request,$id)
    {
        $id_order=$request['id_order'];
        $detail2=detail::all();
        $detail=$detail2->where('id_order',$id_order);
        $transaksi=transaksi::find($id);

        $pdf=PDF::loadview('transaksi.laporan',['detail'=>$detail,'transaksi'=>$transaksi]);
        return $pdf->download('struk-pembayaran.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manual()
    {
        $pdf=PDF::loadview('transaksi.manual');
        return $pdf->download('Tata_cara_pemesanan.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $transaksi=transaksi::all();
        $pdf=PDF::loadview('transaksi.laporan-data-transaksi',['transaksi'=>$transaksi]);
        return $pdf->download('Laporan.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi=transaksi::find($id);
        try{
        $transaksi->delete();
    }catch(\Exception $e){
        return redirect('transaksi')->witherrors('Data transaksi gagal di hapus');
    }return redirect('transaksi')->with('status','Data transaksi berhasil di hapus');
    }
}
