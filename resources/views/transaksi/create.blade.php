@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Data Total Bayar</div>

					<div class="box-body">
					<label class="control-label col-sm-4">Nama</label>		
					<label class="control-label col-sm-1">=</label>	
					<label class="control-label col-sm-7">{{$order->user->nama_user}}</label>		
					<label class="control-label col-sm-4">No Meja</label>		
					<label class="control-label col-sm-1">=</label>	
					<label class="control-label col-sm-7">{{$order->meja->no_meja}}</label>	
					<label class="control-label col-sm-4">Tanggal Pesan</label>		
					<label class="control-label col-sm-1">=</label>	
					<label class="control-label col-sm-7">{{$order->tanggal}}</label>	
					<label class="control-label col-sm-4">Total Bayar</label>		
					<label class="control-label col-sm-1">=</label>	
					<label class="control-label col-sm-7">Rp. {{$total}}</label>
					<div class="col-md-12 form-group row">
					<label class="control-label col-sm-2">Pesanan</label>
							
					<div class="col-sm-10">
						<ul>
							@foreach ($detail as $data)
								<li>{{$data->masakan->nama_masakan}} = Rp. {{$data->harga}}</li>
							@endforeach
						</ul>
					</div>
					</div>				
					</div>
					<div class="box-footer">
						<form action="{{url('transaksi/store')}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="id_order" value="{{$order->id}}">
							<input type="hidden" name="id_user" value="{{$order->id_user}}">
							<?php
							$tgl=date('Y-m-d');
							echo "<input type=\"hidden\" name=\"tanggal\" value=\"$tgl\">";
							?>
							<input type="hidden" name="total_bayar" value="{{$total}}">
							<input type="hidden" name="id_meja" value="{{$order->id_meja}}">
							<input type="hidden" name="status_meja" value="Tersedia">
							<input type="hidden" name="status_order" value="Selesai">
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-usd"></span> Bayar</button>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
