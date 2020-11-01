@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Input Data order</div>

					<div class="box-body">
						@if ($errors->any())
						<div class="alert alert-danger fade in" id="alert">
							<button type="button" class="close" data-dismiss="alert" aria-lable="Close" ><span aria-hidden="true">&times;</span></button>
							<ul>
								<?php
								$messages=$errors->all('<li><label class="label-control">:message</label></li>')
								?>
								<?php
								foreach ($messages as $msg)
									echo $msg;
								?>
							</ul>
						</div>
						@endif
						@if (Auth::user()->level->nama_level=='pelanggan')
						<form action="{{url('order/store/'.Auth::user()->id)}}" method="POST" class="form-group">
						@else
						<form action="{{url('order/store')}}" method="POST" class="form-group">
						@endif
							{{csrf_field()}}
							<div class="form-group row">
								<label class="label-control col-md-4">No Meja</label>
									<div class="col-md-8">
									<select name="id_meja" class="form-control">
										@foreach ($meja as $data)
										<option name="id_meja" value="{{$data->id}}">{{$data->no_meja}}</option>
										@endforeach
									</select>
								</div>
							</div>
							@if (Auth::user()->level->nama_level=='pelanggan')
							<input type="hidden" name="id_user" value="{{Auth::user()->id}}">
							@else
							<div class="form-group row">
								<label class="label-control col-md-4">User</label>
									<div class="col-md-8">
									<select name="id_user" class="form-control">
										@foreach ($user as $data2)
										<option name="id_user" value="{{$data2->id}}" class="form-control">{{$data2->nama_user}}</option>
										@endforeach
									</select>
								</div>
							</div>
							@endif
							

							<div class="form-group row">
								<label class="label-control col-md-4">Keterangan</label>
									<div class="col-md-8">
									<input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
								</div>
							</div>
							<input type="hidden" name="status_order" value="Belum Selesai">
							<input type="hidden" name="status_meja" value="Tidak Tersedia">
							<?php
							$tgl=date('Y-m-d');
							echo "<input type=\"hidden\" name=\"tanggal\" value=\"$tgl\">";
							?>

							<div class="form-group row col-md-4">
								<input type="submit" class="btn btn-primary" value="Tambah">@if (Auth::user()->level->nama_level=='pelanggan')
					            <a href="{{url('order/'.Auth::user()->id)}}" class="btn btn-danger">Batal</a>
					            @else
					            <a href="{{url('meja')}}" class="btn btn-danger">Batal</a>
					            @endif
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
