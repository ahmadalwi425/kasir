@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Input Data masakan</div>

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
						<form action="{{url('masakan/store')}}" method="POST" class="form-group" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="label-control col-md-4">Nama Masakan</label>
									<div class="col-md-8">
									<input type="text" name="nama_masakan" class="form-control" placeholder="Nama Masakan">
								</div>
							</div>
							<div class="form-group row">
								<label class="label-control col-md-4">Harga</label>
									<div class="col-md-8">
									<input type="number" name="harga" class="form-control" placeholder="Harga (Rp.)">
								</div>
							</div>
							<div class="form-group row">
								<label class="label-control col-md-4">Foto</label>
									<div class="col-md-8">
									<input type="file" name="foto" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="label-control col-md-4">Status</label>
									<div class="col-md-8">
									<select name="status_masakan" class="form-control">
										<option name="status_masakan" value="Tersedia">Tersedia</option>
										<option name="status_masakan" value="Tidak Tersedia">Tidak Tersedia</option>
									</select>
								</div>
							</div>
							<div class="form-group row col-md-4">
								<input type="submit" class="btn btn-primary" value="Tambah"> <a href="{{url('masakan')}}" class="btn btn-danger">Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
