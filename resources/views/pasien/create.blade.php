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
  <form class="m-form m-form--fit m-form--label-align-right" action="pasien_store" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <!-- step1 -->
    <div class="m-portlet__body" id="step1">
      <fieldset>
        <h2>Daftar Data Diri Pasien</h2>
        <p class="desc">Inputkan Data Dengan Benar</p>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label>Kode Pasien</label>
            <input required type="text" name="id_pasien" class="form-control" value="PSN{{$rand}}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label>Nama Lengkap</label>
            <input required type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap">
            <input type="hidden" name="tanggal_sekarang" value="{{$now}}">
          </div>
          <div class="form-group col-md-3">
            <label>Tempat Lahir</label>
            <input required type="text" class="form-control" name="tempat_lahir" placeholder="masukkan tempat lahir">
          </div>
          <div class="form-group col-md-3">
            <label>Tanggal Lahir</label>
            <input required readonly type="text" class="form-control date" name="lahir" placeholder="masukkan tanggal lahir">
          </div>
        </div>
        <div class="form-row">
         <div class="form-group col-md-3 only-number">
          <label>Umur</label>
          <input required type="number" class="form-control number" name="umur" placeholder="masukkan umur">
        </div>
        <div class="form-group col-md-3">
          <label>Pekerjaan</label>
          <input required type="text" class="form-control" name="pekerjaan" placeholder="masukkan pekerjaan">
        </div>
        <div class="form-group col-md-3">
          <label>Agama</label>
          <input required type="text" class="form-control" name="agama" placeholder="masukkan Agama">
        </div>
      </div>
      <div class="form-row">
       <div class="form-group col-md-3 only-number">
        <label>Nomor Telepon</label>
        <input required type="text" class="form-control number" name="telepon" placeholder="masukkan No. Telp">
      </div>
      <div class="form-group col-md-3">
        <label>Status Nikah</label>
        <select style="width: 100%;" class="form-control" id="status" name="status">
          <option></option>
          <option value="nikah">Nikah</option>
          <option value="belum_nikah">Belum Nikah</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label>Alamat</label>
        <textarea required class="form-control" name="alamat" rows="3"></textarea>
      </div>
    </div>

    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline1" name="gender" value="laki-laki" class="custom-control-input">
      <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline2" name="gender" value="perempuan" class="custom-control-input">
      <label class="custom-control-label" for="customRadioInline2">perempuan</label>
    </div>

  </fieldset>

  <div class="m-form__actions m-form__actions">
    <a href="#" class="btn btn-primary btn-lg m-btn m-btn--custom" id="next" style="float: right;">Next</a>
    <a href="datapasien" class="btn btn-success btn-lg m-btn m-btn--custom" style="float: left;">Back</a>
  </div>
</div>

<!-- step2 -->
<div class="m-portlet__body" id="step2" style="display:none;">
 <fieldset>
  <h2>Pilihan Tindakan</h2>
  <p>Inputkan Data Dengan Benar</p>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label>spesialis</label>
      <select style="width: 100%;" class="form-control select dynamic" name="spesialis" id="spesialis" data-dependent="dokter">
        <option></option>
        @foreach($dokter as $dok)
        <option value="{{$dok->spesialis}}">{{$dok->spesialis}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-3">
      <label>Dokter</label>
      <select style="width: 100%;" class="form-control select22 dynamic" name="dokter" id="dokter">

      </select>
    </div>
    {{csrf_field()}}
    <div class="form-group col-md-1 only-number">
      <label>No. Antrian</label>
      <input required type="text"name="antrian" class="form-control number">
    </div>
  </div>
</fieldset>

<div class="m-form__actions m-form__actions">
  <button type="submit" class="btn btn-primary btn-lg m-btn m-btn--custom" style="float: right;">Finish</button>
  <a href="#" class="btn btn-metal btn-lg m-btn m-btn--custom" id="previous" style="float: left;">Previous</a>
</div>
</div>


</form>
<!--end::Form-->
</div>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js"></script>
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
    $(".select").select2({
      placeholder: "Pilih Tindakan",
      allowClear: true
    });
    $(".select22").select2({
      placeholder: "Pilih Dokter",
      allowClear: true
    });
    $('.only-number').on('keydown', '.number', function(e){
      -1!==$
      .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
      .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
      || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
      && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    });
    $("#next").click(function () {
      $("#step2").show();
      $("#step1").hide();
    });
    $("#previous").click(function () {
      $("#step2").hide();
      $("#step1").show();
    });
  });
</script>
<script type="text/javascript">
  jQuery(document).ready(function (){
    jQuery('.dynamic').on('change',function(){
      if(jQuery(this).val() != ''){
        var value = jQuery(this).val();
        var dependent = jQuery(this).data('dependent');
        jQuery.ajax({
          url:"{{route('dynamicdependent.fetch')}}",
          method:"get",
          data:{ value:value, dependent:dependent},
          success:function(result)
          {
            jQuery('#'+dependent).html(result);
          }
        });

      }
    });
  });
</script>

@endsection
