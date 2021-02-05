@extends('layouts.cetakpasien')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Cetak Data Pasien</div>

				<div class="card-body">
					<form method="post" action="cetak_semua" autocomplete="off">
						@csrf
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Nama Pasien</label>
							<div class="col-md-6">
								<select name="id_pasien" class="form-control select2 input-lg dynamic">
									<option></option>
									@foreach($pasien as $d)
									<option value="{{$d->id_pasien}}">{{$d->nama}}</option>
									@endforeach
								</select>
							</div>

						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Tanggal Awal</label>

							<div class="col-md-6">
								<input required readonly type="text" name="tanggal_awal" class="form-control date">  
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Tanggal Akhir</label>

							<div class="col-md-6">
								<input required readonly type="text" name="tanggal_akhir" class="form-control date">
							</div>
						</div>
						<!-- <input type="text" name="id_transaksi" id="id_transaksi"> -->
						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-sm btn-primary">Convert</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.date').datepicker({  

		format: 'dd-mm-yyyy',
		autoclose: true,
		todayHighlight: true
	}); 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Nama Pasien",
			allowClear: true
		});
	});
</script>
@endsection