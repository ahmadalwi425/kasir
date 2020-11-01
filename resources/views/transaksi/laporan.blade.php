<html>
<head><link href="{{ asset('/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/></head>
<body>
	<center><img src="{{asset('img/logo.png')}}" height="150"></center>
	<br>
	<center>===========================================================================================</center>
	<center><b><big><big>Laporan Pembayaran</big></big></b></center>
	<center>===========================================================================================</center>
	<br>
	<center>
		<big>
		<table border="0">
		<tr>
			<th width="100">Nama</th>
			<th width="10">=</th>
			<th>{{$transaksi->user->nama_user}}</th>
		</tr>
		<tr>
			 <th>No Meja</th> 
			 <th>=</th> 
			 <th>{{$transaksi->order->meja->no_meja}}</th> 
		</tr>
		<tr>
			 <th>Tanggal</th> 
			 <th>=</th> 
			 <th>{{$transaksi->tanggal}}</th> 
		</tr>
	</table>
	<br></big>
	<center>===========================================================================================</center>
	<center><b><big><big>Pesanan</big></big></b></center>
	<center>===========================================================================================</center>
	<br>
	<big>
	<table border="0">

	@foreach ($detail as $data)
	<tr>
	<th width="100">{{$data->masakan->nama_masakan}}</th>
	<th width="10">=</th> 
	<th>{{$data->harga}}</th> 
	</tr>
	@endforeach
</table>
</big>
<br>
<center>===========================================================================================</center>

</center>
<big><b>Total	=	Rp.{{$transaksi->total_bayar}}</b></big>

</body>
</html>

