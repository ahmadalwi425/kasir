@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="box box-primary animated fadeInDown">
					<div class="box-header">Data User</div>

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
						<a href="{{url('user/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
						</div>
						<table id="dataTables" class="table table-hover table-stripped">
							<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Nama User</th>
								<th>Level</th>
								@if (Auth::user()->level->nama_level=='administrator')
								<th>Edit</th>
								<th>Hapus</th>
								@else
								@endif
							</tr>
						</thead>
						<tbody>
							@foreach ($user as $data)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$data->username}}</td>
								<td>{{$data->nama_user}}</td>
								<td>{{$data->level->nama_level}}</td>
								@if (Auth::user()->level->nama_level=='administrator')
								<td><a href="{{url('user/edit/'.$data->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
								<td><form action="{{url('user/destroy/'.$data->id)}}" method="POST">
								{{csrf_field()}}
								<button type="submit" class="btn btn-danger" onclick="confirm('Yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
								</form>
								</td>
								@else
								@endif
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
