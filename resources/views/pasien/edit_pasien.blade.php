@extends('layouts.datapasien')
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
  <!--begin::Form-->
  <form class="m-form m-form--fit m-form--label-align-right" action="pasien/{{$data->id_pasien}}/save_data_pasien" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <!-- step1 -->
    <div class="m-portlet__body">
      <fieldset>

        <h2>Edit Data Diri Pasien</h2>
        <p class="desc">Inputkan Data Dengan Benar</p>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label>Kode Pasien</label>
            <input type="text" readonly class="form-control" name="id_pasien" value="{{$data->id_pasien}}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label>Nama Lengkap</label>
            <input required type="text" class="form-control" name="nama" value="{{$data->nama}}">
          </div>
          <div class="form-group col-md-3">
            <label>Tempat Lahir</label>
            <input required type="text" class="form-control" name="tempat_lahir" placeholder="masukkan tempat lahir" value="{{$data->tempat_lahir}}">
          </div>
          <div class="form-group col-md-3">
            <label>Tanggal Lahir</label>
            <input required readonly type="text" class="form-control date" name="lahir" value="{{$data->tanggal_lahir}}">
          </div>
        </div>
        <div class="form-row">
         <div class="form-group col-md-3 only-number">
          <label>Umur</label>
          <input required type="number" class="form-control number" name="umur" placeholder="masukkan umur" value="{{$data->umur}}">
        </div>
        <div class="form-group col-md-3">
          <label>Pekerjaan</label>
          <input required type="text" class="form-control" name="pekerjaan" placeholder="masukkan pekerjaan" value="{{$data->pekerjaan}}">
        </div>
        <div class="form-group col-md-3">
          <label>Agama</label>
          <input required type="text" class="form-control" name="agama" placeholder="masukkan Agama" value="{{$data->agama}}">
        </div>
      </div>
      <div class="form-row">
       <div class="form-group col-md-3 only-number">
        <label>Nomor Telepon</label>
        <input required type="text" class="form-control number" name="telepon" placeholder="masukkan No. Telp" value="{{$data->telepon}}">
      </div>
      <div class="form-group col-md-3">
        <label>Status Nikah</label>
        <select required style="width: 100%;" class="form-control" id="status" name="status">
          <option></option>
          <option value="nikah" @if($data->status == 'nikah')selected @endif>Nikah</option>
          <option value="belum_nikah" @if($data->status == 'belum_nikah')selected @endif>Belum Nikah</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label>Alamat</label>
        <textarea required class="form-control" name="alamat" rows="3">{{$data->alamat}}</textarea>
      </div>
    </div>

    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="laki" name="gender" <?php echo ($data->gender =='laki-laki')?'checked':'' ?> value="laki-laki" class="custom-control-input">
      <label class="custom-control-label" for="laki">Laki-Laki</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="perempuan" name="gender" <?php echo ($data->gender =='perempuan')?'checked':'' ?> value="perempuan" class="custom-control-input">
      <label class="custom-control-label" for="perempuan">perempuan</label>
    </div>

  </fieldset>

  <div class="m-form__actions m-form__actions">
    <button type="submit" class="btn btn-primary btn-lg m-btn m-btn--custom" style="float: right;">Finish</button>
    <a href="datapasien" class="btn btn-success btn-lg m-btn m-btn--custom" style="float: left;">Back</a>
  </div>
</div>

</form>
<!--end::Form-->
</div>

<!-- JS -->
<script type="text/javascript">
  $('.date').datepicker({

    format: 'dd-mm-yyyy',
    autoclose: true,
    todayHighlight: true
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#status").select2({
      placeholder: "Pilih Status",
      allowClear: true
    });
    $('.only-number').on('keydown', '.number', function(e){
      -1!==$
      .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
      .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
      || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
      && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    });
  });
</script>
@endsection
