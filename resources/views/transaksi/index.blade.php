@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Data transaksi</div>

					<div class="box-body">
						@if (session('status'))
						<div class="alert alert-success fade in" id="alert" >
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
							@if ($transaksi->count() > 0)
							<a href="{{url('transaksi/laporan')}}" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download Laporan</a>
							@else
							<a href="{{url('transaksi/laporan')}}" class="btn btn-primary" disabled="true"><span class="glyphicon glyphicon-download"></span> Tidak Ada Data Laporan</a>
							@endif
						</div>
						<table id="dataTables" class="table table-hover table-stripped">
							<thead>
							<tr>
								<th>No</th>
								<th>User</th>
								<th>No Meja</th>
								<th>Tanggal Bayar</th>
								<th>Total</th>
								<th>Cetak</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($transaksi as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$data->user->nama_user}}</td>
								<td>{{$data->order->meja->no_meja}}</td>
								<td>{{$data->tanggal}}</td>
								<td>Rp. {{$data->total_bayar}}</td>
								<td><form action="{{url('transaksi/print/'.$data->id)}}" method="POST">
								{{csrf_field()}}
								<input type="hidden" name="id_order" value="{{$data->id_order}}">
								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print</button>
								</form>
								</td>
								<td><form action="{{url('transaksi/destroy/'.$data->id)}}" method="POST">
								{{csrf_field()}}
								<button type="submit" class="btn btn-danger" onclick="confirm('Yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
								</form>
								</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
