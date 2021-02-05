<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwaldokter;
use App\dokter;
use App\jadwalpasien;
use App\pasien;
use App\obat;
use App\detailpasien;
use App\obatpasien;
use App\terjadwal;
use Illuminate\Support\Facades\DB;
use Alert;
class terjadwalController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $list = DB::table('pasien')
      ->join('terjadwal','terjadwal.id_pasien','=','pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','terjadwal.id_dokter')
      ->get()
      ->sortBy('tanggal_terjadwal');
      return view('terjadwal.terjadwal',compact('list'))->with('i');
    }

    public function jadwal_hari_ini()
    {
      $now = date('d-m-Y');
      $sekarang = DB::table('pasien')
      ->join('terjadwal','terjadwal.id_pasien','=','pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','terjadwal.id_dokter')
      ->where('tanggal_terjadwal','=',$now)
      ->get();
      return view('terjadwal.now.grid',compact('sekarang'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pasien, $tanggal_kunjung)
    {
      $list = DB::table('pasien')
      ->join('terjadwal','terjadwal.id_pasien','=','pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','terjadwal.id_dokter')
      ->where('terjadwal.tanggal_kunjung','=',$tanggal_kunjung)
      ->where('terjadwal.id_pasien','=',$id_pasien)
      ->get();
      return view('terjadwal.view',compact('list'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pasien, $tanggal_kunjung)
    {
      $list = DB::table('pasien')
      ->join('terjadwal','terjadwal.id_pasien','=','pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','terjadwal.id_dokter')
      ->where('terjadwal.tanggal_kunjung','=',$tanggal_kunjung)
      ->where('terjadwal.id_pasien','=',$id_pasien)
      ->first();
      return view('terjadwal.edit',compact('list'));
    }

    public function ubah($id_pasien, $tanggal_kunjung)
    {
      $join = DB::table('pasien')
      ->join('terjadwal','terjadwal.id_pasien','=','pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','terjadwal.id_dokter')
      ->where('terjadwal.tanggal_kunjung','=',$tanggal_kunjung)
      ->where('terjadwal.id_pasien','=',$id_pasien)
      ->first();
      $obat= obat::get();
      return view('terjadwal.now.ubah',compact('join','obat'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pasien , $tanggal_kunjung)
    {
      $this->validate($request,[
        'tanggal' => 'required',
        'jam' => 'required'
      ]);

      $data = [
        'tanggal_terjadwal' => $request->tanggal,
        'jam_terjadwal' => $request->jam
      ];

      $pasien = DB::table('terjadwal')->where('tanggal_kunjung','=',$tanggal_kunjung)->where('id_pasien','=', $id_pasien)->update($data);
      Alert::success('Data Berhasil Diupdate','Tersimpan')->persistent("OK");
      return redirect('terjadwal');
    }
    public function perbarui(Request $request, $id_pasien , $tanggal_kunjung)
    {
      $detail_pasien = detailpasien::create([
        'id_pasien' => $id_pasien,
        'tanggal_kunjung' => $tanggal_kunjung,
        'id_dokter' => request('id_dokter'),
        'catatan' => request('catatan')
      ]);

      // masuk ke table obat pasien
      if (count($request->id_obat) > 0 ){
        foreach ($request->id_obat as $item => $v) {
          $obat_pasien= array(
            $harga = $request->harga[$item],
            $hrg = preg_replace("/[^0-9]/", "", $harga),
            'id_pasien' => $id_pasien,
            'id_obat' => $request->id_obat[$item],
            'tanggal_kunjung' => $tanggal_kunjung,
            'jumlah' => $request->jumlah[$item],
            'harga' => $hrg
          );
          obatpasien::create($obat_pasien);
        }
      }

        // dibawah ini untuk mengupdate stok yang telah dikurangi
      if (count($request->id_obat) > 0 ){
        foreach ($request->id_obat as $item => $v) {
          $obat= array(
            $stok = $request->stok[$item],
            $jumlah = $request->jumlah[$item],
            $total = $stok - $jumlah,
            $harga = $request->harga[$item],
            $hrg = preg_replace("/[^0-9]/", "", $harga),

            'id_obat' => $request->id_obat[$item],
            'nama_obat' => $request->obat[$item],
            'stok' => $total,
            'harga' => $hrg,
            'jenis_obat' => $request->jenis[$item]
          );
          $obats = obat::find($request->id_obat[$item]);
          $obats->delete();
          obat::create($obat);
        }
      }
      $terjadwal = terjadwal::where('tanggal_kunjung','=',$tanggal_kunjung)->where('id_pasien','=',$id_pasien);
      $terjadwal->delete();
      Alert::success('Data Berhasil Disimpan','Tersimpan')->persistent("OK");
      return redirect('now');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  }
