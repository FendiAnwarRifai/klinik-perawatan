@extends('layouts.datadokter')
@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					List Dokter
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="{{url('create')}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span>Tambah Data</span>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">

		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
			<thead>
				<tr>
					<th>No. </th>
					<th>Nama</th>
					<th>Spesialis</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dokter as $dok)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$dok->nama_dokter}}</td>
					<td>{{$dok->spesialis}}</td>
					<td>
						<form action="dokter/{{$dok->id_dokter}}/destroy" method="post" enctype="multipart/form-data" class="test{{$i}}">
							@csrf
							<a class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="dokter.{{$dok->id_dokter}}.lihat" data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "1000px"}}}'><i class="fas fa-id-card"></i></a>

							<a class="btn btn-outline-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="dokter.{{$dok->id_dokter}}.edit"><i class="fas fa-user-edit"></i></a>

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
		<?php foreach ($dokter as $dok): ?>
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
