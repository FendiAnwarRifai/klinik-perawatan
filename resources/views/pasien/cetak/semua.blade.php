<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		@page {
			margin: 0cm 0cm;
		}
		body {
			margin-top: 2cm;
			margin-left: 2cm;
			margin-right: 2cm;
			margin-bottom: 1.5cm;
		}
		.oke h4{
			float: right;
			border: 2px solid black;
			padding: 3px;
		}
	</style>
</head>
<body>
	<div class="oke">
		<h4>No. Pasein : {{$pasien->id_pasien}}</h4>
		<br><br><div style="border: 2px solid black;"></div><br>
	</div>
	<table width="100%">
		<tr>
			<td>
				
				<div class="form-group">
					<strong>Nama Pasien : </strong>{{$pasien->nama}}
				</div>
				
				
				<div class="form-group">
					<strong>Tempat Lahir : </strong>{{$pasien->tempat_lahir}}
				</div>
				
				
				<div class="form-group">
					<strong>Tanggal Lahir : </strong>{{$pasien->tanggal_lahir}}
				</div>
				

				
			</td>
			<td>
				
				<div class="form-group">
					<strong>Umur : </strong>{{$pasien->umur}}
				</div>
				
				
				<div class="form-group">
					<strong>Jenis Kelamin : </strong>{{$pasien->gender}}
				</div>
				
				
				<div class="form-group">
					<strong>Status Nikah : </strong>{{$pasien->status}}
				</div>
				
			</td>
			<td>
				
				<div class="form-group">
					<strong>No. Telp : </strong>{{$pasien->telepon}}
				</div>
				
				
				<div class="form-group">
					<strong>Pekerjaan : </strong>{{$pasien->pekerjaan}}
				</div>
				
				
				<div class="form-group">
					<strong>Agama : </strong>{{$pasien->agama}}
				</div>
				
			</td>
		</tr>
	</table>

	<table>
		<tr>
			<div class="form-group">
				<strong>Alamat : </strong>{{$pasien->alamat}}
			</div>
		</tr>
	</table>
	<br>
	@foreach($detail as $detail)
	<div class="row">
		<div class="col-md-12">
			<h4 class="col-md-12">Tanggal Kunjung : {{ Carbon\Carbon::parse($detail->tanggal_kunjung)->formatLocalized('%A, %d %B %Y')}}</h4>
		</div>
	</div>
	<div style="border: 1px solid #999999;"></div>

	<table>
		<tr>
			<td>
				<div class="col-md-12">
					<div class="form-group">
						<strong>Nama Dokter : </strong>{{$detail->nama_dokter}}
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<strong>Tindakan: </strong>{{$detail->spesialis}}
					</div>
				</div>
			</td>
		</tr>
	</table>
	<?php 
	$obat = DB::table('pasien')
	->join('obat_pasien','obat_pasien.id_pasien','=','pasien.id_pasien')
	->join('obat','obat.id_obat','=','obat_pasien.id_obat')
	->where('obat_pasien.tanggal_kunjung','=',$detail->tanggal_kunjung)
	->where('pasien.id_pasien','=',$id_pasien)
	->get();
	?>
	<br>
	<table border="1" class="table table-striped- table-bordered table-hover table-checkable">
		<thead class="thead-dark">
			<tr class="text-center">
				<th width="1%">No.</th>
				<th width="15%">Nama Obat</th>
				<th width="15%">Jumlah</th>
				<th width="15%">Harga</th>
				<th width="15%">Total Harga</th>
			</tr>
		</thead>
		<tbody>
			@foreach($obat as $obats)
			<tr class="text-center">
				<td>{{++$i}}</td>
				<td>{{$obats->nama_obat}}</td>
				<td>{{$obats->jumlah}}</td>
				<td>{{$obats->harga}}</td>
				<td>{{$obats->harga * $obats->jumlah}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<br>
	<div style="border: 2px solid black;">
		<div style="margin: 5px; text-align: justify;">
			<h5><strong>CATATAN :</strong></h5>
			{{$detail->catatan}}
		</div>
	</div>
	<br><br><br>
	@endforeach
</body>
</html>