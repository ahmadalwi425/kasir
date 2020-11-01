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
						<form action="{{url('order/update/'.$order->id.'/'.Auth::user()->id)}}" method="POST" class="form-group">
						@else
						<form action="{{url('order/update/'.$order->id)}}" method="POST" class="form-group">
						@endif
							{{csrf_field()}}
							<div class="form-group row">
								<label class="label-control col-md-4">Keterangan</label>
									<div class="col-md-8">
									<input type="text" name="keterangan" class="form-control" value="{{$order->keterangan}}">
								</div>
							</div>

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
