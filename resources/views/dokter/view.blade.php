@extends('layouts.view')
@section('content')
<br>
<div class="m-portlet m-portlet--full-height">
	<div class="m-portlet__body">
		<div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_5" role="tablist">
			<div class="accordion" id="accordionExample">
				<div class="m-accordion__item m-accordion__item--danger">
					<div class="m-accordion__item-head collapse" id="headingOne" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<span class="m-accordion__item-icon"><i class="fas fa-user-alt"></i></span>
						<span class="m-accordion__item-title"><font size="4%">{{$dokter->nama_dokter}}</font></span>
						<span class="m-accordion__item-mode"></span>
					</div>

					<div id="collapseOne" class="collapse show m-accordion__item-body" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<table border="1" class="table table-striped- table-bordered table-hover table-checkable">
								<thead>
									<tr class="text-center">
										<th width="2%"><font size="4%" class="font-weight-bold">No.</font></th>
										<th width="40%"><font size="4%" class="font-weight-bold">Hari</font></th>
										<th width="40%"><font size="4%" class="font-weight-bold">Jam</font></th>
									</tr>
								</thead>
								<tbody>
									@foreach($jadwal as $jad)
									<tr>
										<td><font size="4%">{{++$i}}</font></td>
										<td><font size="4%">{{$jad->hari_awal}} - {{$jad->hari_akhir}}</font></td>
										<td><font size="4%">
											<?php
											$date = new DateTime($jad->jam_mulai);
											echo $date->format('H:i');
											?>
											 s/d
											<?php
											$date = new DateTime($jad->jam_selesai);
											echo $date->format('H:i');
											?>
										</font></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
			<font size="4%">
				<label class="font-weight-bold">Spesialis :</label>
				{{$dokter->spesialis}}
			</font>
		</div>
	</div>
</div>
@endsection
