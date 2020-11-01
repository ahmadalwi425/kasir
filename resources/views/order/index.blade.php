@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Data order</div>

					<div class="box-body">
						@if (session('status'))
						<div class="alert alert-success fade in" id="alert">
							<button type="button" class="close" data-dismiss="alert" aria-lable="Close" ><span aria-hidden="true">&times;</span></button>
							{{session('status')}}
						</div>
						@endif
						@if (count($errors))
						<div class="alert alert-danger fade in" id="alert">
							<button type="button" class="close" data-dismiss="alert" aria-lable="Close" ><span aria-hidden="true">&times;</span></button>
							<label class="label-control">Maaf, Ada kesalahan</label>
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<div class="form-group row col-md-12">
							@if (Auth::user()->level->nama_level=='pelanggan')
							@if ($jumlah > 0)
						<a href="{{url('order/create/'.Auth::user()->id)}}" class="btn btn-danger" disabled="true"><span class="glyphicon glyphicon-block"></span> Pesanan Anda Sebelumnya Belum Selesai</a></div>
						@else
						<a href="{{url('order/create/'.Auth::user()->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a></div>
						@endif
						@else
						<a href="{{url('order/create/'.Auth::user()->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a></div>
						@endif
						<table class="table table-hover table-stripped">
							<thead>
							<tr>
								<th>No</th>
								<th>No Meja</th>
								<th>Tangal Pesan</th>
								<th>User</th>
								<th>Keterangan</th>
								<th>Status</th>
								@if (Auth::user()->level->nama_level=='kasir')
								@else
								<th>Hapus</th>
								<th>Edit</th>
								@endif
								@if (Auth::user()->level->nama_level=='kasir')
								@elseif (Auth::user()->level->nama_level=='owner')
								@else
								<th>Pesanan</th>
								@endif
								@if (Auth::user()->level->nama_level=='administrator')
								<th>Total Bayar</th>
								@elseif (Auth::user()->level->nama_level=='kasir')
								<th>Total Bayar</th>
								@else
								@endif
							</tr></thead>
							<tbody>
							@foreach ($order as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$data->meja->no_meja}}</td>
								<td>{{$data->tanggal}}</td>
								<td>{{$data->user->nama_user}}</td>
								<td>{{$data->keterangan}}</td>
								<td>{{$data->status_order}}</td>
								@if (Auth::user()->level->nama_level=='kasir')
								@else
								@if (Auth::user()->level->nama_level=='pelanggan')
								<td><form action="{{url('order/destroy/'.$data->id.'/'.Auth::user()->id)}}" method="POST">
								{{csrf_field()}}
								<input type="hidden" name="id_meja" value="{{$data->id_meja}}">
								<input type="hidden" name="status_meja" value="Tersedia">
								<button type="submit" class="btn btn-danger" onclick="confirm('Yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
								</form>
								</td>
								@else
								<td><form action="{{url('order/destroy/'.$data->id)}}" method="POST">
								{{csrf_field()}}
								<input type="hidden" name="id_meja" value="{{$data->id_meja}}">
								<input type="hidden" name="status_meja" value="Tersedia">
								<button type="submit" class="btn btn-danger" onclick="confirm('Yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
								</form>
								</td>
								@endif
								@endif
								@if($data->status_order=='Selesai')
								@if (Auth::user()->level->nama_level=='kasir')
								<td><label class="label label-success">Pesanan Telah selesai 
								</label>
								</td>
								@else
								<td colspan="3"><center><label class="label label-success">Pesanan Telah selesai 
								</label></center>
								</td>
								@endif
								@else
								@if (Auth::user()->level->nama_level=='kasir')
								@else
								<td><a href="{{url('order/edit/'.$data->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
								@endif
								@if (Auth::user()->level->nama_level=='kasir')
								@elseif (Auth::user()->level->nama_level=='owner')
								@else
								<td><a href="{{url('detail/'.$data->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-glass"></span> Lihat Pesanan</a></td>
								@endif
								@if (Auth::user()->level->nama_level=='administrator')
								<td><a href="{{url('transaksi/create/'.$data->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-usd"></span> Lihat Total</a></td>
								@elseif (Auth::user()->level->nama_level=='kasir')
								<td><a href="{{url('transaksi/create/'.$data->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-usd"></span> Lihat Total</a></td>
								@else
								@endif
								@endif
							</tr>
							@endforeach
						</tbody>
						</table>
						@if (Auth::user()->level->nama_level=='pelanggan')
						<label class="label label-success">*Jika sudah memesan,silahkan LogOut dan anda dapat menunggu pesanan di meja pesanan anda</label>
						@else
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
