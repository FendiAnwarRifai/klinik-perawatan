@extends('layouts.now')
@section('content')
<div class="m-portlet m-portlet--mobile">
  <div class="m-portlet__head">
    <div class="m-portlet__head-caption">
      <div class="m-portlet__head-title">
        <h3 class="m-portlet__head-text">
          Jadwal Pasien Hari Ini
        </h3>
      </div>
    </div>
  </div>
  <div class="m-portlet__body">

    <!--begin: Datatable -->
    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_2">
      <thead>
        <tr>
          <th>No. </th>
          <th>Nama Pasien</th>
          <th>Alamat</th>
          <th>Jam</th>
          <th>Dokter => Tindakan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
@foreach($sekarang as $now)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$now->nama}}</td>
          <td>{{$now->alamat}}</td>
          <td><?php $date = new DateTime($now->jam_terjadwal); echo $date->format('H:i');?></td>
          <td>{{$now->nama_dokter}} => {{$now->spesialis}}</td>
          <td>
            <a class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="list.{{$now->id_pasien}}.{{$now->tanggal_kunjung}}.view" data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "1000px"}}}'><i class="fas fa-id-card"></i></a>

            <a class="btn btn-outline-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="now.{{$now->id_pasien}}.{{$now->tanggal_kunjung}}.ubah"><i class="fas fa-user-edit"></i></a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection