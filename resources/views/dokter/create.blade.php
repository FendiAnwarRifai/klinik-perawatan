@extends('layouts.datadokter')
@section('content')
<!--begin::Portlet-->
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Tambah Dokter
				</h3>
			</div>
		</div>
	</div>

	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right" action="tambahdokter" method="post" enctype="multipart/form-data" autocomplete="off">
		@csrf
		<div class="m-portlet__body">
			<div class="m-form__content">
				<div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
					<div class="m-alert__icon">
						<i class="la la-warning"></i>
					</div>
					<div class="m-alert__text">
					</div>
					<div class="m-alert__close">
					</div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label class="col-form-label col-lg-3 col-sm-12"><b>Nama Dokter</b></label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<input required type="text" class="form-control m-input" name="nama" placeholder="nama dokter">
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label class="col-form-label col-lg-3 col-sm-12"><b>Spesialis</b></label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="input-group">
						<input required type="text" class="form-control m-input" name="spesialis" placeholder="speasialis">
					</div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label class="col-form-label col-lg-2 col-sm-12"></label>
				<div class=" col-md-9 col-sm-12">
					<div class="input-group">

						<table width="100%">
							<thead>
								<tr>
									<td colspan="3" align="center"><strong>Hari</strong></td>
									<td></td>
									<td><strong>Jam Mulai</strong></td>
									<td><strong>Jam Selesai</strong></td>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td style="width: 15%; padding-bottom: 20px;">
										<select required style="width: 100%;" class="form-control select2" name="hari_awal[]">
											<option></option>
											<option value="Senin">Senin</option>
											<option value="Selasa">Selasa</option>
											<option value="Rabu">Rabu</option>
											<option value="Kamis">Kamis</option>
											<option value="Jumat">Jumat</option>
											<option value="Sabtu">Sabtu</option>
											<option value="Minggu">Minggu</option>
										</select>
									</td>
									<td class="align-middle" style="width: 3%; padding-bottom: 20px;">
										s/d
									</td>
									<td style="width: 15%; padding-bottom: 20px;">
										<select style="width: 100%;" class="form-control select2" name="hari_akhir[]">
											<option value=""></option>
											<option value="Senin">Senin</option>
											<option value="Selasa">Selasa</option>
											<option value="Rabu">Rabu</option>
											<option value="Kamis">Kamis</option>
											<option value="Jumat">Jumat</option>
											<option value="Sabtu">Sabtu</option>
											<option value="Minggu">Minggu</option>
										</select>
									</td>
									<td></td>
									<td style="width: 15%; padding-bottom: 20px;">
										<input required readonly type="text" style="width: 90%;" name="jam_mulai[]" class="form-control timepicker">
									</td>
									<td style="width: 15%; padding-bottom: 20px;">
										<input required readonly type="text" style="width: 90%;" name="jam_selesai[]" class="form-control timepicker">
									</td>
									<td style="padding-bottom: 20px;">
										<a href="#" class="btn btn-sm btn-info mb-2 tambah"><i class="la la-plus"></i></a>
									</td>
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>


			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions">
					<div class="row">
						<div class="col-lg-9 ml-lg-auto">
							<button type="submit" class="btn btn-info">Simpan</button>
							<a href="{{ url('/datadokter') }}" class="btn btn-success">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
		<!--end::Form-->
</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
	$(document).ready(function(){
		$('.timepicker').timepicker({
			minuteStep: 1,
			showSeconds: false,
			showMeridian: false
		});
		$('.select2').select2({
			placeholder: "PIlih Hari",
			allowClear: true
		});
		var i=1;
		$('.tambah').click(function(){
			i++;
			$('tbody').append(
				'<tr id="row'+i+'">'+

				'<td style="width: 15%; padding-bottom: 20px;"><select required style="width: 100%;" class="form-control select2" name="hari_awal[]"><option></option><option value="Senin">Senin</option><option value="Selasa">Selasa</option><option value="Rabu">Rabu</option><option value="Kamis">Kamis</option><option value="Jumat">Jumat</option><option value="Sabtu">Sabtu</option><option value="Minggu">Minggu</option></select></td>'+

				'<td class="align-middle" style="width: 3%; padding-bottom: 20px;">s/d</td>'+

				'<td style="width: 15%; padding-bottom: 20px;"><select style="width: 100%;" class="form-control select2" name="hari_akhir[]"><option></option><option value="Senin">Senin</option><option value="Selasa">Selasa</option><option value="Rabu">Rabu</option><option value="Kamis">Kamis</option><option value="Jumat">Jumat</option><option value="Sabtu">Sabtu</option><option value="Minggu">Minggu</option></select></td>'+
				'<td></td>'+
				'<td style="width: 15%; padding-bottom: 20px;"><input required readonly type="text" style="width: 90%;" name="jam_mulai[]" class="form-control timepicker"></td>'+

				'<td style="width: 15%; padding-bottom: 20px;"><input required readonly type="text" style="width: 90%;" name="jam_selesai[]" class="form-control timepicker"></td>'+

				'<td style="padding-bottom: 20px;"><a href="#" class="btn btn-sm btn-danger mb-2 remove" id="'+i+'"><i class="fas fa-minus"></i></a></td>'+
				'</tr>'
			);
			$('.select2').select2({
				placeholder: "PIlih Hari",
				allowClear: true
			});
			$('.timepicker').timepicker({
				minuteStep: 1,
				showSeconds: false,
				showMeridian: false
			});
			$(document).on('click', '.remove', function(){
				var button_id = $(this).attr("id");
				$('#row'+button_id+'').remove();
			});

		});
	});
</script>
@if($errors->all())
<script type="text/javascript">
	$(document).ready(function(){
		Swal({
				type: 'error',
				title: 'Whoops! Inputkankan Data Dengan Benar.',
				text: 'FORM TIDAK BOLEH ADA YANG KOSONG!'
			})
	});
</script>
@endif
@endsection
