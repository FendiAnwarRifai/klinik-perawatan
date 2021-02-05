@extends('layouts.datapasien')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Detail Pasien</h3>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h3 class="col-md-12">{{$pasien->nama}}</h3>
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-3">
			<div class="col-md-12">
				<div class="form-group">
					<strong>Tempat Lahir : </strong>{{$pasien->tempat_lahir}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Tanggal Lahir : </strong>{{$pasien->tanggal_lahir}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Jenis Kelamin : </strong>{{$pasien->gender}}
				</div>
			</div>
		</div>
		<div class="form-group col-md-3">
			<div class="col-md-12">
				<div class="form-group">
					<strong>Umur : </strong>{{$pasien->umur}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Pekerjaan : </strong>{{$pasien->pekerjaan}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Agama : </strong>{{$pasien->agama}}
				</div>
			</div>
		</div>
		<div class="form-group col-md-6">
			<div class="col-md-12">
				<div class="form-group">
					<strong>No. Telp : </strong>{{$pasien->telepon}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Status Nikah : </strong>{{$pasien->status}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Alamat : </strong>{{$pasien->alamat}}
				</div>
			</div>
		</div>
	</div>


</div>

<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__body">

		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_3">
			<thead>
				<tr>
					<th>No. </th>
					<th>Tanggal Kunjung</th>
					<th>Nama Dokter</th>
					<th>Tindakan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>

				@foreach($join as $data)
				<tr>
					<td>{{++$i}}</td>
					<td>{{ Carbon\Carbon::parse($data->tanggal_kunjung)->formatLocalized('%A, %d %B %Y')}}</td>
					<td>{{$data->nama_dokter}}</td>
					<td>{{$data->spesialis}}</td>
					<td>
						<form action="cetak/{{$data->id_pasien}}/{{$data->tanggal_kunjung}}/satu" method="post" enctype="multipart/form-data" class="test{{$i}}">
						@csrf
							<a data-toggle="m-popover" data-content="Detail Obat" data-placement="left" class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="pasien.{{$data->id_pasien}}.{{$data->tanggal_kunjung}}.detail_obat" data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "1000px"}}}'><i class="fas fa-id-card"></i></a>

							<a href="#" data-toggle="m-popover" data-content="Cetak Data Ini" data-placement="right" class="btn btn-outline-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air cetak{{$i}}"><i class="fas fa-file-pdf"></i></a>
						</form>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		<?php foreach ($join as $data): ?>
			var q{{++$d}} = {{$b++}};
			$('.cetak'+q{{$d}}+'').click(function(){  
				Swal.fire({
					title: 'Apakah Anda Yakin Untuk Mencetak Data Ini?',
					text: "Data Akan Dicetak ke PDF!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Cetak Data Ini!',
					cancelButtonText: 'Tidak, Cancel!',
				}).then((result) => {
					if (result.value) {
						$('.test'+q{{$d}}+'').submit();
					}
				});
			});
		<?php endforeach ?> 
	});
</script>
@endsection
