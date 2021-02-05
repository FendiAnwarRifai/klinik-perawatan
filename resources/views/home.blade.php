@extends('layouts.dashboard')
@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Antrian Pasien Hari Ini
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<!--begin: Datatable -->

		<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_2">
			<thead>
				<tr>
					<th>No. </th>
					<th>Nama Pasien</th>
					<th>Dokter</th>
					<th>Tindakan</th>
					<th>No Antrian</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($join as $joins)
				<tr>
					<td>{{++$a}}</td>
					<td>{{$joins->nama}}</td>
					<td>{{$joins->nama_dokter}}</td>
					<td>{{$joins->spesialis}}</td>
					<td>{{$joins->antrian}}</td>
					<td>
						<a class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="antrian_pasien.{{$joins->id_pasien}}.view" data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "1000px"}}}'><i class="fas fa-id-card"></i></a>

						<a class="btn btn-outline-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="jadwal_pasien.{{$joins->id_pasien}}.edit"><i class="fas fa-user-edit"></i></a>

					</td>
				</tr>
				@endforeach
			</tbody>
			<tr>
				<td colspan="6">
					<form action="tindakan" method="get">
						Sort By :
						<select class="form-control form-control-sm col-md-2 select2" name="tindakan" onchange="this.form.submit();">
							<option value=""></option>
							<option value="all">Tampilkan Semua Data</option>
							@foreach($dok as $tindakan)
							<option value="{{$tindakan->spesialis}}">{{$tindakan->spesialis}}</option>
							@endforeach
						</select>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Pilih Tindakan",
			allowClear: true
		});
	});
	</script>
@endsection
