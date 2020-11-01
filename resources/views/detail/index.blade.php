@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">
				<div class="col-md-12">
				<div class="panel panel-primary animated fadeInDown">
					<div class="panel-heading"><span class="glyphicon glyphicon-list"></span>
						 Daftar Menu Masakan</div>
					<div class="panel-body overflow" style="overflow:auto;">
						<table style="padding: 15px;" class="col-md-12">
							
						@foreach ($masakan as $data)
						<div class="col-md-2">
						<td>
							
								<div class="box box-primary">
									<div class="box-header">
										{{$data->nama_masakan}}
									</div>
									<div class="box-body">
										<img src="{{asset('upload/'.$data->foto)}}" width="132" height="100">
									</div>
									<div class="box-footer">
										
											<label class="control-label pull-right">Rp. {{$data->harga}}</label>
										<form action="{{url('detail/store/'.$order->id)}}" method="POST">
											{{csrf_field()}}
											
											<input type="hidden" name="id_masakan" value="{{$data->id}}">
											<input type="hidden" name="id_order" value="{{$order->id}}">
											<input type="hidden" name="harga" value="{{$data->harga}}">
											<input type="hidden" name="status_detail" value="belum">
											@if ($data->status_masakan=='Tersedia')
											<input type="submit" class="btn btn-primary btn-xs" value="Pesan">
											@else
											<input type="submit" class="btn btn-danger btn-xs" value="Kosong" disabled="true">
											@endif
										</form>
										
									
								</div>
							</div>
						
					</td>
				</div>
						@endforeach
					
				</table>
					</div>
				</div>
				</div>
				<div class="col-md-6">
				<div class="box box-primary animated fadeInLeft">
					<div class="box-header"><label class="control-label">Data order</label></div>
					<div class="box-body">
						<label class="control-label col-md-4">Nama User</label>
						<label class="control-label col-md-1">=</label>
						<label class="control-label col-md-7">{{$order->user->nama_user}}</label>
						<label class="control-label col-md-4">No Meja</label>
						<label class="control-label col-md-1">=</label>
						<label class="control-label col-md-7">{{$order->meja->no_meja}}</label>
						<label class="control-label col-md-4">Tanggal Order</label>
						<label class="control-label col-md-1">=</label>
						<label class="control-label col-md-7">{{$order->tanggal}}</label>
					</div>
				</div>
				</div>
				<div class="col-md-6">
				<div class="box box-primary animated fadeInRight">
					<div class="box-header"><label class="control-label">Data Pesanan</label></div>

					</table>
					<div class="box-body">
						@if ($jumlah > 0)
						<table class="table table-stripped table-hover">
						@foreach ($detail as $data2)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$data2->masakan->nama_masakan}}</td>
							<td>Rp. {{$data2->harga}}</td>
							<td>
								@if ($data2->status_detail=='belum')
								<form action="{{url('detail/destroy/'.$data2->id)}}" method="POST">
								{{csrf_field()}}
								<input type="hidden" name="id_order" value="{{$order->id}}">
								<button type="submit" class="btn btn-danger" onclick="confirm('Yakin ingin menghapus pesanan?')">Batal</button>

							</form>
						@else
						<label class="label label-success">Masakan Selesai</label>
						@endif
						</td>


						@if (Auth::user()->level->nama_level=='pelanggan')
						@else
						<td><form action="{{url('detail/update/'.$data2->id.'/'.$order->id)}}" method="POST">
								{{csrf_field()}}
								<input type="hidden" name="status_detail" value="selesai">
								<button type="submit" class="btn btn-primary">Siap</button>
							</form>
						</td>
						@endif
						</tr>
						@endforeach
					</table>
					@if (Auth::user()->level->nama_level=='pelanggan')
					<div class="col-md-4"><a href="{{url('order/'.Auth::user()->id)}}" class="btn btn-primary"><i class='fa fa-check'></i> Selesai</a></div>
					@else
					<div class="col-md-4"><a href="{{url('order')}}" class="btn btn-primary"><i class='fa fa-check'></i> Selesai</a></div>
					@endif
					@else
					<label class="control-label">Belum ada pesanan</label>
					@endif
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
@endsection
