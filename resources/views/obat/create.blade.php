@extends('layouts.obat')
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
					Tambah Obat
				</h3>
			</div>
		</div>
	</div>

	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right" action="tambahobat" method="post" enctype="multipart/form-data" autocomplete="off">
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
				<label class="col-form-label col-lg-3 col-sm-12"></label>
				<div class=" col-md-9 col-sm-12">
					<table width="100%" cellpadding="6">
						<thead>
							<tr>
								<td><strong>Nama Obat</strong></td>
								<td><strong>Stok</strong></td>
								<td><strong>Jenis Obat</strong></td>
								<td><strong>Harga</strong></td>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td style="width: 20%;">
									<input required type="text" class="form-control" name="nama_obat[]" placeholder="Nama Obat">
								</td>
								<td style="width: 10%;">
									<input required type="text" class="form-control" name="stok[]" placeholder="stok">
								</td>
								<td style="width: 18%;">
									<select class="form-control select2" name="jenis_obat[]">
										<option></option>
										<option value="salep">Salep</option>
										<option value="pil">Pil</option>
										<option value="bubuk">Bubuk</option>
										<option value="kapsul">Kapsul</option>
										<option value="sirup">Sirup</option>
									</select>
								</td>
								<td style="width: 20%;">
									<input required type="text" class="form-control" name="harga[]" data-mask="000.000.000" data-mask-reverse="true" placeholder="Harga">
								</td>
								<td>
									<a href="#" class="btn btn-sm btn-info mb-2 tambah"><i class="la la-plus"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions">
					<div class="row">
						<div class="col-lg-9 ml-lg-auto">
							<button type="submit" class="btn btn-info">Simpan</button>
							<a href="obathome" class="btn btn-success">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--end::Form-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Jenis Obat",
			allowClear: true
		});
		var i=1;
		$('.tambah').click(function(){
			i++;
			$('tbody').append(
				'<tr id="row'+i+'">'+

				'<td style="width: 20%;"><input required type="text" class="form-control" name="nama_obat[]" placeholder="Nama Obat"></td>'+

				'<td style="width: 10%;"><input required type="text" class="form-control" name="stok[]" placeholder="stok"></td>'+

				'<td style="width: 18%;"><select class="form-control select22" name="jenis_obat[]"><option></option><option value="salep">Salep</option><option value="pil">Pil</option><option value="bubuk">Bubuk</option><option value="kapsul">Kapsul</option><option value="sirup">Sirup</option></select></td>'+

				'<td style="width: 20%;"><input required type="text" class="form-control uang" name="harga[]" placeholder="Harga"></td>'+

				'<td style="padding-bottom: 20px;"><a href="#" class="btn btn-sm btn-danger mb-2 remove" id="'+i+'"><i class="fas fa-minus"></i></a></td>'+
				'</tr>'
				);
			$(".select22").select2({
				placeholder: "Jenis Obat",
				allowClear: true
			});
			
			$(document).on('click', '.remove', function(){
				var button_id = $(this).attr("id");
				$('#row'+button_id+'').remove();
			});

			// format uang
			$(function(){
				$(".uang").keyup(function(e){
					$(this).val(format($(this).val()));
				});
			});
			var format = function(num){
				var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
				if(str.indexOf(",") > 0) {
					parts = str.split(",");
					str = parts[0];
				}
				str = str.split("").reverse();
				for(var j = 0, len = str.length; j < len; j++) {
					if(str[j] != ".") {
						output.push(str[j]);
						if(i%3 == 0 && j < (len - 1)) {
							output.push(".");
						}
						i++;
					}
				}
				formatted = output.reverse().join("");
				return("" + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
			};


		});
	});
</script>
@endsection
