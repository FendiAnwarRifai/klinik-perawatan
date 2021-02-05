@extends('layouts.schedule')
@section('content')
<!-- batas antar table -->
<div class="m-portlet m-portlet--mobile">
  <div class="m-portlet__head">
    <div class="m-portlet__head-caption">
      <div class="m-portlet__head-title">
        <h3 class="m-portlet__head-text">
          List Pasien Terjadwal
        </h3>
      </div>
    </div>
  </div>
  <div class="m-portlet__body">

    <!--begin: Datatable -->
    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_3">
      <thead>
        <tr>
          <th>No. </th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Nama</th>
          <th>Dokter => Tindakan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($list as $list)
        <tr>
          <td>{{++$i}}</td>
          <td>{{ Carbon\Carbon::parse($list->tanggal_terjadwal)->formatLocalized('%A, %d %B %Y')}}</td>
          <td><?php $date = new DateTime($list->jam_terjadwal); echo $date->format('H:i');?></td>
          <td>{{$list->nama}}</td>
          <td>{{$list->nama_dokter}} => {{$list->spesialis}}</td>
          <td>
            <a class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="list.{{$list->id_pasien}}.{{$list->tanggal_kunjung}}.view" data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "1000px"}}}'><i class="fas fa-id-card"></i></a>

            <a class="btn btn-outline-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" href="list.{{$list->id_pasien}}.{{$list->tanggal_kunjung}}.edit"><i class="fas fa-user-edit"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection