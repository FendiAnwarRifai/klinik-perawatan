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
					Edit Data Obat
				</h3>
			</div>
		</div>
	</div>

	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right" action="obat/{{$obat->id_obat}}/update" method="post" enctype="multipart/form-data">
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
					<div class="form-row">
						<div class="col col-md-3">
							<label>Nama Obat</label>
							<input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" value="{{$obat->nama_obat}}">
						</div>
						<div class="col col-md-1">
							<label>Stok</label>
							<input type="text" class="form-control" name="stok" placeholder="stok" value="{{$obat->stok}}">
						</div>
						<div class="col col-md-2">
							<label>Jenis Obat</label>
							<select style="width: 100%;" class="form-control select2" name="jenis_obat">
								<option></option>
								<option value="salep" @if($obat->jenis_obat == 'salep')selected @endif>Salep</option>
								<option value="pil" @if($obat->jenis_obat == 'pil')selected @endif>Pil</option>
								<option value="bubuk" @if($obat->jenis_obat == 'bubuk')selected @endif>Bubuk</option>
								<option value="kapsul" @if($obat->jenis_obat == 'kapsul')selected @endif>Kapsul</option>
								<option value="sirup" @if($obat->jenis_obat == 'sirup')selected @endif>Sirup</option>
							</select>
							</div>
							<div class="col col-md-3">
								<label>Harga</label>
								<input type="text" class="form-control" name="harga" data-mask="000.000.000" data-mask-reverse="true" placeholder="Harga" value="{{$obat->harga}}">
							</div>
						</div>
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
	<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Jenis Obat",
			allowClear: true
		});
	});
</script>
	@endsection
