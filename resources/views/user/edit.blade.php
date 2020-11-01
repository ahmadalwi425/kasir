@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Edit</div>

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
						<form action="{{url('user/update/'.$user->id)}}" method="POST" class="form-group">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="label-control col-md-4">Username</label>
									<div class="col-md-8">
									<input type="text" name="username" class="form-control" value="{{$user->username}}">
								</div>
							</div>
							<div class="form-group row">
								<label class="label-control col-md-4">Nama User</label>
									<div class="col-md-8">
									<input type="text" name="nama_user" class="form-control" value="{{$user->nama_user}}">
								</div>
							</div>
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
							<div class="form-group row col-md-4">
								<input type="submit" class="btn btn-primary" value="Edit"> <a href="{{url('user')}}" class="btn btn-danger">Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
