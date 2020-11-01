@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Input Data meja</div>

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
						<form action="{{url('meja/store')}}" method="POST" class="form-group">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="label-control col-md-4">No Meja</label>
									<div class="col-md-8">
									<input type="number" name="no_meja" class="form-control" placeholder="No Meja">
								</div>
							</div>
							<div class="form-group row">
								<label class="label-control col-md-4">Status</label>
									<div class="col-md-8">
									<select name="status_meja" class="form-control">
										<option name="status_meja" value="Tersedia">Tersedia</option>
										<option name="status_meja" value="Tidak Tersedia">Tidak Tersedia</option>
									</select>
								</div>
							</div>
							<div class="form-group row col-md-4">
								<input type="submit" class="btn btn-primary" value="Tambah">  <a href="{{url('meja')}}" class="btn btn-danger">Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
