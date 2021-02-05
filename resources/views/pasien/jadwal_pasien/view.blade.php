@extends('layouts.view')
@section('content')
<br>
<div class="m-portlet m-portlet--full-height">
	<div class="m-portlet__body">
		<div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_5" role="tablist">
			<div class="accordion" id="accordionExample">
				<div class="m-accordion__item m-accordion__item--danger">
					<div class="m-accordion__item-head collapse" id="headingOne" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<span class="m-accordion__item-icon"><i class="fas fa-user"></i></span>
						<span class="m-accordion__item-title"><font size="3%">{{$nama->nama}} ({{$nama->id_pasien}})</font></span>
						<span class="m-accordion__item-mode"></span>
					</div>

					<div id="collapseOne" class="collapse show m-accordion__item-body" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<table border="1" class="table table-striped- table-bordered table-hover table-checkable">
								<thead>
									<tr class="text-center">
										<th width="1%"><font size="3%" class="font-weight-bold">No.</font></th>
										<th width="15%"><font size="3%" class="font-weight-bold">Tanggal Kunjung</font></th>
										<th width="15%"><font size="3%" class="font-weight-bold">Jenis Kelamin</font></th>
										<th width="15%"><font size="3%" class="font-weight-bold">Tanggal Lahir</font></th>
										<th width="15%"><font size="3%" class="font-weight-bold">Tindakan</font></th>
										<th width="15%"><font size="3%" class="font-weight-bold">Nama Dokter</font></th>
									</tr>
								</thead>
								<tbody>
									@foreach($join as $joins)
									<tr class="text-center">
										<td><font size="3%">{{++$i}}</font></td>
										<td><font size="3%">{{ Carbon\Carbon::parse($joins->tanggal_kunjung)->formatLocalized('%A, %d %B %Y')}}</font></td>
										<td><font size="3%">{{$joins->gender}}</font></td>
										<td><font size="3%">{{$joins->tanggal_lahir}}</font></td>
										<td><font size="3%">{{$joins->spesialis}}</font></td>
										<td><font size="3%">{{$joins->nama_dokter}}</font></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
			<font size="3%">
				<label class="font-weight-bold">Alamat Pasien:</label>
				{{$nama->alamat}}
			</font>
		</div>
	</div>
</div>
@endsection
