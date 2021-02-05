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
						<span class="m-accordion__item-title"><font size="3%"></font></span>
						<span class="m-accordion__item-mode"></span>
					</div>

					<div id="collapseOne" class="collapse show m-accordion__item-body" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<table border="1" class="table table-striped- table-bordered table-hover table-checkable">
								<thead>
									<tr class="text-center">
										<th width="15%"><font size="3%" class="font-weight-bold">Tanggal Kunjung</font></th>
										<th width="15%"><font size="3%" class="font-weight-bold">Jenis Kelamin</font></th>
										<th width="15%"><font size="3%" class="font-weight-bold">Alamat</font></th>

									</tr>
								</thead>
								<tbody>

									<tr class="text-center">
										<td><font size="3%"></font></td>
										<td><font size="3%"></font></td>
										<td><font size="3%"></font></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
