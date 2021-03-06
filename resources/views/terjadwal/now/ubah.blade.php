@extends('layouts.now')
@section('content')
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
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Edit Data Pasien Yang Terjadwal Hari Ini
				</h3>
			</div>
		</div>
	</div>

		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" action="now/{{$join->id_pasien}}/{{$join->tanggal_kunjung}}/perbarui" method="post" enctype="multipart/form-data" autocomplete="off">
			@csrf
			<div class="m-portlet__body">
				

				<div class="form-group m-form__group row">
					<div class="col-lg-5 col-md-9 col-sm-12">
						<div class="form-row">
							<div class="col">
								<label>Id Pasien</label>
								<input type="text" class="form-control" readonly value="{{$join->id_pasien}}">
							</div>
							<div class="col">
								<label>Nama Pasien</label>
								<input required type="text" class="form-control m-input" name="nama_pasien" value="{{$join->nama}}">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<div class="col-lg-5 col-md-9 col-sm-12">
						<div class="form-row">
							<div class="col">
								<label>Tindakan</label>
								<input name="tindakan" type="text" class="form-control" readonly value="{{$join->spesialis}}">
							</div>
							<div class="col">
								<label>Nama Dokter</label>
								<input name="nama_dokter" type="text" class="form-control" readonly value="{{$join->nama_dokter}}">
								<input name="id_dokter" type="hidden" class="form-control" readonly value="{{$join->id_dokter}}">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group m-form__group row">
					
					<div class="col-lg-4 col-md-9 col-sm-12">
						<div class="form-row">
							<div class="col">
								<label>Alamat</label>
								<textarea required name="alamat" class="form-control" rows="2">{{$join->alamat}}</textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group m-form__group row" id="ok">
					<div class=" col-md-9 col-sm-12">
						<div class="input-group">
							<table width="100%" cellpadding="6">
						<thead>
							<tr>
								<td><strong>Nama Obat</strong></td>
								<td><strong>Stok</strong></td>
								<td><strong>Jumlah</strong></td>
								<td><strong>Jenis Obat</strong></td>
								<td><strong>Harga</strong></td>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td style="width: 20%;">
									<select class="form-control select2" name="id_obat[]" id="element">
												<option></option>
												@foreach($obat as $obats)
												<option harga="{{number_format($obats->harga)}}" stok="{{$obats->stok}}" value="{{$obats->id_obat}}" obat="{{$obats->nama_obat}}" jenis="{{$obats->jenis_obat}}">{{$obats->nama_obat}}</option>
												@endforeach
											</select>
											<input type="hidden" name="obat[]" readonly class="form-control mb-2 obat" placeholder="obat">
								</td>
								<td style="width: 10%;">
									<input type="text" name="stok[]" readonly class="form-control mb-2 stok" placeholder="stok">
								</td>
								<td style="width: 18%;">
									<input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah">
								</td>
								<td style="width: 18%;">
									<input readonly type="text" id="jenis" class="form-control" name="jenis[]" placeholder="Jenis Obat">
								</td>
								<td style="width: 20%;">
									<input type="text" name="harga[]" readonly id="harga" class="form-control mb-2" placeholder="harga">
								</td>
								<td>
									<a href="#" class="btn btn-sm btn-info mb-2 tambah"><i class="la la-plus"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
						</div>
					</div>
				</div>
				<div class="form-group m-form__group row" id="oke">
					<div class="col-lg-4 col-md-9 col-sm-12">
						<div class="form-row">
							<div class="col">
								<label>Catatan</label>
								<textarea name="catatan" class="form-control" rows="3"></textarea>
							</div>
						</div>
					</div>
				</div>
				<br>


				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions">
						<div class="row">
							<div class="col" id="cetak">
								<a href="now" class="btn btn-success">Back</a>
								<button type="submit" class="btn btn-info">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--end::Form-->

</div>
<script type="text/javascript">
$('.date').datepicker({

	format: 'dd-mm-yyyy',
	autoclose: true,
	todayHighlight: true
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('.select2').select2({
		placeholder: "PIlih Obat",
		allowClear: true
	});
	var i=1;
		$('.tambah').click(function(){
			i++;
			$('tbody').append(
				'<tr id="row'+i+'">'+

				'<td style="width: 20%;"><select class="form-control select22 kedua" name="id_obat[]" id="'+i+'"><option></option>@foreach($obat as $obats)<option harga="{{number_format($obats->harga)}}" stok="{{$obats->stok}}" value="{{$obats->id_obat}}" obat="{{$obats->nama_obat}}" jenis="{{$obats->jenis_obat}}">{{$obats->nama_obat}}</option>@endforeach</select><input type="hidden" name="obat[]" readonly class="form-control mb-2 obats'+i+'" placeholder="obat"></td>'+

				'<td style="width: 10%;"><input required type="text" name="stok[]" readonly class="form-control mb-2 stoks'+i+'" placeholder="stok"></td>'+

				'<td style="width: 18%;"><input required type="text" class="form-control" name="jumlah[]" placeholder="Jumlah"></td>'+

				'<td style="width: 18%;"><input required readonly type="text" id="jenis'+i+'" class="form-control" name="jenis[]" placeholder="Jenis Obat"></td>'+

				'<td style="width: 20%;"><input required type="text" name="harga[]" readonly id="harga'+i+'" class="form-control mb-2" placeholder="harga"></td>'+

				'<td><a href="#" class="btn btn-sm btn-danger mb-2 remove" id="'+i+'"><i class="fas fa-minus"></i></a></td>'+
				'</tr>'
				);
			$(".select22").select2({
				placeholder: "Pilih Obat",
				allowClear: true
			});
			$(document).on('click', '.remove', function(){
				var button_id = $(this).attr("id");
				$('#row'+button_id+'').remove();
			});

			$(document).on('change', '.kedua', function(){
				var select_id = $(this).attr("id");
				var stoks = $('#'+select_id+' option:selected').attr('stok');
				var harga = $('#'+select_id+' option:selected').attr('harga');
				var obats = $('#'+select_id+' option:selected').attr('obat');
				var jeniss = $('#'+select_id+' option:selected').attr('jenis');
				var texts = $('#'+select_id+' option:selected').val();
				$('.stoks'+select_id+'').val(stoks);
				$('#harga'+select_id+'').val(harga);
				$('.obats'+select_id+'').val(obats);
				$('#jenis'+select_id+'').val(jeniss);
				$('.nama_barang'+select_id+'').val(texts);
			});
		});
	$("#element").on("change", function(){
			var harga = $("#element option:selected").attr("harga");
			var stok = $("#element option:selected").attr("stok");
			var obat = $("#element option:selected").attr("obat");
			var jenis = $("#element option:selected").attr("jenis");
			var text = $("#element option:selected").val();
			$("#harga").val(harga);
			$(".stok").val(stok);
			$(".obat").val(obat);
			$("#jenis").val(jenis);
			$(".nama_barang").val(text);
		});
});
</script>
@endsection
