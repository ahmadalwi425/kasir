@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Input Data User</div>

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
						<form action="{{url('user/store')}}" method="POST" class="form-group">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="label-control col-md-4">Username</label>
									<div class="col-md-8">
									<input type="text" name="username" class="form-control" placeholder="username">
								</div>
							</div>
							<div class="form-group row">
								<label class="label-control col-md-4">Password</label>
									<div class="col-md-8">
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
							</div>
							<div class="form-group row">
								<label class="label-control col-md-4">Nama User</label>
									<div class="col-md-8">
									<input type="text" name="nama_user" class="form-control" placeholder="Nama User">
								</div>
							</div>
							@if (Auth::user()->level->nama_level=='administrator')
							<div class="form-group row">
								<label class="label-control col-md-4">Level</label>
									<div class="col-md-8">
									<select name="id_level" class="form-control">
										@foreach ($level as $data)
										<option name="id_level" value="{{$data->id}}">{{$data->nama_level}}</option>
										@endforeach
									</select>
								</div>
							</div>
							@else
							<iput type="hidden" name="id_level" value="5">
							@endif
							<div class="form-group row col-md-4">
								<input type="submit" class="btn btn-primary" value="Tambah"> <a href="{{url('user')}}" class="btn btn-danger">Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
