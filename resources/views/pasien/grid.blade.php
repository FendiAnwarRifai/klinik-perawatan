@extends('layouts.datapasien')
@section('content')

<!-- batas antar table -->

<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					List Pasien Yang Sudah Terdaftar
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="{{url('datalama')}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span>Tambah Data Untuk Pasien Lama</span>
						</span>
					</a>
				</li>
				<li class="m-portlet__nav-item">
					<a href="{{url('pasientambah')}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span>Tambah Data Pasien Baru</span>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">

		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_3">
			<thead>
				<tr>
					<th width="1px">No. </th>
					<th>Nama Pasien</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pasien as $data)
				<tr>
					<td width="1px">{{++$i}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->alamat}}</td>
					<td>
						<form action="pasien/{{$data->id_pasien}}/hapus" method="post" enctype="multipart/form-data" class="test{{$i}}">
							@csrf
						<a data-toggle="m-popover" data-content="Detail Pasien" data-placement="left" class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="pasien.{{$data->id_pasien}}.lihat"><i class="fas fa-id-card"></i></a>

						<a data-toggle="m-popover" data-content="Edit Data Pasien" data-placement="bottom" class="btn btn-outline-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="pasien.{{$data->id_pasien}}.edit_pasien"><i class="fas fa-user-edit"></i></a>

						<a href="#" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air hapus{{$i}}">
							<i class="fas fa-trash-alt"></i>
						</a>
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
		$(".select2").select2({
			placeholder: "Pilih Tindakan",
			allowClear: true
		});
				<?php foreach ($pasien as $data): ?>
			var q{{++$d}} = {{$b++}};
			$('.hapus'+q{{$d}}+'').click(function(){  
				Swal.fire({
					title: 'Apakah Anda Yakin Untuk Menghapus Data Ini?',
					text: "Data Akan Hilang!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Hapus Data Ini!',
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
