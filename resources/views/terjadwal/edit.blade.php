@extends('layouts.schedule')
@section('content')
<div class="container">
  <form method="post" id="signup-form" class="signup-form" action="terjadwal/{{$list->id_pasien}}/{{$list->tanggal_kunjung}}/update" enctype="multipart/form-data">
			@csrf
    <div>
      <h3></h3>
      <fieldset>
        <h2>Edit Jadwal Pasien</h2>
        <p class="desc">Inputkan Data Dengan Benar</p>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label>Kode Pasien</label>
						<input type="text" readonly class="form-control" name="id_pasien" value="{{$list->id_pasien}}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-5">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" readonly name="nama" value="{{$list->nama}}">
          </div>
          <div class="form-group col-md-5">
            <label>Tanggl Lahir</label>
            <input type="text" class="form-control" readonly name="lahir" value="{{$list->tanggal_lahir}}">
          </div>
        </div>
				<div class="form-row">
          <div class="form-group col-md-5">
            <label>Tangga Terjadwal</label>
            <input readonly type="text" name="tanggal" class="form-control date" autocomplete="off" value="{{$list->tanggal_terjadwal}}">
          </div>
          <div class="form-group col-md-5">
            <label>Jam Terjadwal</label>
            <input readonly type="text" name="jam" class="form-control timepicker" autocomplete="off" value="<?php $date = new DateTime($list->jam_terjadwal); echo $date->format('H:i');?>">
          </div>
        </div>
      </fieldset>
    </div>
  </form>
</div>

<!-- JS -->

<script src="stepsa/vendor/jquery-validation/dist/jquery.validate.js"></script>
<script src="stepsa/vendor/jquery-steps/jquery.steps.js"></script>
<script src="stepsa/js/main.js"></script>
<script type="text/javascript">
$('.date').datepicker({

	format: 'dd-mm-yyyy',
	autoclose: true,
	todayHighlight: true
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('.timepicker').timepicker({
		minuteStep: 1,
		showSeconds: false,
		showMeridian: false
	});
});
</script>
@endsection
