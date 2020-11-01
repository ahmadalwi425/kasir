@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			@foreach ($masakan as $data)
			<div class="col-md-2">
				<div class="box box-primary animated fadeInUp">
					<div class="box-header">
						{{$data->nama_masakan}}
					</div>
					<div class="box-body">
						<img src="{{asset('upload/'.$data->foto)}}" width="132" height="100">
					</div>
					<div class="box-footer">
						<label class="pull-right">Rp. {{$data->harga}}</label>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endsection
