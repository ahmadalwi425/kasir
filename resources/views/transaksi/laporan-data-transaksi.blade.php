<html>
<head><link href="{{ asset('/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/></head>
<body>
	<center><img src="{{asset('img/logo.png')}}" height="150"></center>
	<br>
	<center>===========================================================================================</center>
	<center><b><big><big>Laporan Transaksi</big></big></b></center>
	<center>===========================================================================================</center>
	<br>
	<br>
	<big><big>
		<center>
	<table border="0">
		<tr>
			<th width="50"><center>No</center></th>
			<th width="90"><center>User</center></th>
			<th width="50"><ceter>No Meja</ceter></th>
			<th width="200"><center>Tanggal Bayar</center></th>
			<th width="100">Total</th>
		</tr>
		@foreach ($transaksi as $data)
		<tr>
			<td height="20"><center>{{$loop->iteration}}</center></td>
			<td><center>{{$data->user->nama_user}}</center></td>
			<td><center>{{$data->order->meja->no_meja}}</center></td>
			<td><center>{{$data->tanggal}}</center></td>
			<td>Rp.{{$data->total_bayar}}</td>
		</tr>
		@endforeach
	</table></center>
	</big></big>
</body>
</html>

