@extends('layouts.datadokter')
@section('content')
<!--begin::Portlet-->
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Edit Data Dokter
				</h3>
			</div>
		</div>
	</div>

	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right" action="dokter/{{$dokter->id_dokter}}/update" method="post" enctype="multipart/form-data" autocomplete="off">
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
					<input required type="text" class="form-control m-input" name="nama" value="{{$dokter->nama_dokter}}" placeholder="Nama Dokter">
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label class="col-form-label col-lg-3 col-sm-12"><b>Spesialis</b></label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="input-group">
						<input type="text" required class="form-control m-input" name="spesialis" value="{{$dokter->spesialis}}" placeholder="Spesialis">
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
									<td colspan="3" align="center" style="padding-bottom: 15px; width: 15%;"><strong>Hari</strong></td>
									<td style="width: 1%;"></td>
									<td style="padding-bottom: 15px; width: 15%;"><strong>Jam Mulai</strong></td>
									<td style="padding-bottom: 15px; width: 15%;"><strong>Jam Selesai</strong></td>
									<td style="padding-bottom: 15px; width: 15%;">
										<a href="#" class="btn btn-sm btn-info mb-2 tambah"><i class="la la-plus"></i></a>
									</td>
								</tr>
							</thead>
							<tbody>
								@foreach($jadwal as $jad)
								<tr id="baris{{++$i}}">
									<td style="width: 15%; padding-bottom: 20px;">
										<select required style="width: 100%;" class="form-control select2" name="hari_awal[]">
											<option></option>
											<option value="Senin" @if($jad->hari_awal == 'Senin')selected @endif>Senin</option>
											<option value="Selasa" @if($jad->hari_awal == 'Selasa')selected @endif>Selasa</option>
											<option value="Rabu" @if($jad->hari_awal == 'Rabu')selected @endif>Rabu</option>
											<option value="Kamis" @if($jad->hari_awal == 'Kamis')selected @endif>Kamis</option>
											<option value="Jumat" @if($jad->hari_awal == 'Jumat')selected @endif>Jumat</option>
											<option value="Sabtu" @if($jad->hari_awal == 'Sabtu')selected @endif>Sabtu</option>
											<option value="Minggu" @if($jad->hari_awal == 'Minggu')selected @endif>Minggu</option>
										</select>
									</td>
									<td class="align-middle" align="center" style="width: 3%; padding-bottom: 20px;">
										s/d
									</td>
									<td style="width: 15%; padding-bottom: 20px;">
										<select style="width: 100%;" class="form-control select2" name="hari_akhir[]">
											<option></option>
											<option value="Senin" @if($jad->hari_akhir == 'Senin')selected @endif>Senin</option>
											<option value="Selasa" @if($jad->hari_akhir == 'Selasa')selected @endif>Selasa</option>
											<option value="Rabu" @if($jad->hari_akhir == 'Rabu')selected @endif>Rabu</option>
											<option value="Kamis" @if($jad->hari_akhir == 'Kamis')selected @endif>Kamis</option>
											<option value="Jumat" @if($jad->hari_akhir == 'Jumat')selected @endif>Jumat</option>
											<option value="Sabtu" @if($jad->hari_akhir == 'Sabtu')selected @endif>Sabtu</option>
											<option value="Minggu" @if($jad->hari_akhir == 'Minggu')selected @endif>Minggu</option>
										</select>
									</td>
									<td style="width: 1%;"></td>
									<td style="width: 15%; padding-bottom: 20px;">
										<input required readonly type="text" style="width: 90%;" name="jam_mulai[]" class="form-control timepicker" value="{{$jad->jam_mulai}}">
									</td>
									<td style="width: 15%; padding-bottom: 20px;">
										<input required readonly type="text" style="width: 90%;" name="jam_selesai[]" class="form-control timepicker" value="{{$jad->jam_selesai}}">
									</td>
									<td style="padding-bottom: 20px;">
								<a href="#" class="btn btn-sm btn-danger mb-2" id="del{{$i}}"><i class="fa fa-minus"></i></a>
							</td>
								</tr>
								@endforeach
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
		</form>
		<!--end::Form-->
	</div>
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

				'<td class="align-middle" align="center" style="width: 3%; padding-bottom: 20px;">s/d</td>'+

				'<td style="width: 15%; padding-bottom: 20px;"><select style="width: 100%;" class="form-control select2" name="hari_akhir[]"><option></option><option value="Senin">Senin</option><option value="Selasa">Selasa</option><option value="Rabu">Rabu</option><option value="Kamis">Kamis</option><option value="Jumat">Jumat</option><option value="Sabtu">Sabtu</option><option value="Minggu">Minggu</option></select></td>'+
				'<td style="width: 1%;"></td>'+
				'<td style="width: 15%; padding-bottom: 20px;"><input readonly type="text" required style="width: 90%;" name="jam_mulai[]" class="form-control timepicker"></td>'+

				'<td style="width: 15%; padding-bottom: 20px;"><input readonly required type="text" style="width: 90%;" name="jam_selesai[]" class="form-control timepicker"></td>'+

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
				var L = $('tbody tr').length;
				if (L == 1) {
					Swal.fire({
						type: 'error',
						title: 'Anda Tidak Boleh Menghapus Baris Terakhir!',
						text: 'Error! Silahkan Pilih Kembali'
					});
				} else {
					$('#row'+button_id+'').remove();
				}
			}); 

		});
	});

	// hapus baris append
		<?php foreach ($jadwal as $jad): ?>
			var hapus{{++$hapus}} = {{$terhapus++}};
			$('#del'+hapus{{$hapus}}+'').on('click', function(){ 
				var L = $('tbody tr').length;
				if (L == 1) {
					Swal.fire({
						type: 'error',
						title: 'Anda Tidak Boleh Menghapus Baris Terakhir!',
						text: 'Error! Silahkan Pilih Kembali'
					});
				} else {
					$('#baris'+hapus{{$hapus}}+'').remove(); 
				}
			}); 
		<?php endforeach ?>

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
