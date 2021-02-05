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
use PDF;
use Alert;
use Carbon\Carbon;
class datapasienController extends Controller
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
  public function index(Request $request)
  {
    $b = 1;
    $d = 0;
    $pasien = DB::table('pasien')->latest()->get();
    return view('pasien.grid',compact('pasien','b','d'))->with('i');
  }

  public function fetch(Request $request)
  {
    $value =$request->get('value');
    $dok = DB::table('dokter')
    ->where('spesialis','=', $value)
    ->get();
    foreach ($dok as $row) {
      $output = '<option></option><option value="'.$row->id_dokter.'">'.$row->nama_dokter.'</option>';
      echo $output;
    }
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $rand = rand(100,999);
    $dokter = DB::table('dokter')->distinct()->get(['spesialis']);
    $now = date('d-m-Y');
    return view('pasien.create',compact('dokter','now','rand'));
  }

  public function buat()
  {
    $dokter = DB::table('dokter')->distinct()->get(['spesialis']);
    $now = date('d-m-Y');
    $id = DB::table('pasien')->get();
    return view('pasien.buatlama',compact('dokter','now','id'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request,[
      'nama' => 'required',
      'gender'=>'required',
      'tempat_lahir'=>'required',
      'lahir' => 'required',
      'umur' => 'required',
      'pekerjaan' => 'required',
      'agama' => 'required',
      'telepon' => 'required',
      'status' => 'required',
      'alamat' => 'required',
      'dokter' => 'required',
      'antrian' => 'required',
      'tanggal_sekarang' => 'required'
    ]);
    $pasien = new pasien;
    $pasien->id_pasien = $request->id_pasien;
    $pasien->nama = $request->nama;
    $pasien->gender = $request->gender;
    $pasien->tempat_lahir = $request->tempat_lahir;
    $pasien->tanggal_lahir = $request->lahir;
    $pasien->umur = $request->umur;
    $pasien->pekerjaan = $request->pekerjaan;
    $pasien->agama = $request->agama;
    $pasien->telepon = $request->telepon;
    $pasien->status = $request->status;
    $pasien->alamat = $request->alamat;
    $pasien->save();

    $jadwal = new jadwalpasien;
    $jadwal->id_pasien = $request->id_pasien;
    $jadwal->id_dokter = $request->dokter;
    $jadwal->antrian = $request->antrian;
    $jadwal->tanggal_kunjung = Carbon::parse($request->tanggal_kunjung)->formatLocalized('%Y-%m-%d');
    $jadwal->save();
    Alert::success('Data Berhasil Ditambahkan','Tersimpan')->persistent("OK");
    return redirect('datapasien');
  }
  public function simpan(Request $request)
  {
    $this->validate($request,[
      'dokter' => 'required',
      'antrian' => 'required',
      'tanggal_sekarang' => 'required'
    ]);

    $jadwal = new jadwalpasien;
    $jadwal->id_pasien = $request->id_pasien;
    $jadwal->id_dokter = $request->dokter;
    $jadwal->antrian = $request->antrian;
    $jadwal->tanggal_kunjung = Carbon::parse($request->tanggal_kunjung)->formatLocalized('%Y-%m-%d');
    $jadwal->save();
    Alert::success('Data Berhasil Ditambahkan','Tersimpan')->persistent("OK");
    return redirect('/home');
  }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id_pasien)
    {
      $nama = DB::table('jadwal_pasien')
      ->join('pasien','pasien.id_pasien','=','jadwal_pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','jadwal_pasien.id_dokter')
      ->where('jadwal_pasien.id_pasien',$id_pasien)
      ->first();

      $join = DB::table('jadwal_pasien')
      ->join('pasien','pasien.id_pasien','=','jadwal_pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','jadwal_pasien.id_dokter')
      ->where('jadwal_pasien.id_pasien',$id_pasien)
      ->get();

      return view('pasien/jadwal_pasien/view',compact('join','nama'))->with('i');
    }

    public function lihat($id_pasien)
    {
      $b = 1;
      $d = 0;
      $join = DB::table('detail_pasien')
      ->join('pasien','pasien.id_pasien','=','detail_pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','detail_pasien.id_dokter')
      ->where('detail_pasien.id_pasien','=', $id_pasien)
      ->get();
      $pasien = DB::table('pasien')
      ->where('pasien.id_pasien',$id_pasien)
      ->first();
      return view('pasien/view',compact('join','pasien','b','d'))->with('i');
    }


    public function detail_obat($id_pasien , $tanggal_kunjung)
    {
      $obat = DB::table('obat_pasien')
      ->join('obat','obat.id_obat','=','obat_pasien.id_obat')
      ->where('obat_pasien.tanggal_kunjung','=', $tanggal_kunjung)
      ->where('obat_pasien.id_pasien','=',$id_pasien)
      ->get();
      return view('pasien/detail_obat',compact('obat'))->with('i');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id_pasien)
    {
      $join = DB::table('jadwal_pasien')
      ->join('pasien','pasien.id_pasien','=','jadwal_pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','jadwal_pasien.id_dokter')
      ->where('jadwal_pasien.id_pasien',$id_pasien)
      ->first();
      $obat= obat::get();
      return view('pasien/jadwal_pasien/edit',compact('join','obat'));
    }

    public function edit_pasien($id_pasien)
    {
      $data = DB::table('pasien')->where('id_pasien','=',$id_pasien)->first();
      return view('pasien/edit_pasien',compact('data'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id_pasien)
    {
      // jika input terjadwal dicentang
      if ($request->get('terjadwal') == 'terjadwal') {
        $terjadwal = terjadwal::create([
          'id_pasien' => $id_pasien,
          'tanggal_kunjung' => Carbon::parse($request->tanggal_kunjung)->formatLocalized('%Y-%m-%d'),
          'id_dokter' => request('id_dokter'),
          'tanggal_terjadwal' => request('tanggal'),
          'jam_terjadwal' => request('jam')
        ]);
      }
      // jika input terjadwal tidak dicentang
      elseif($request->get('terjadwal') == 0) {
        $detail_pasien = detailpasien::create([
          'id_pasien' => $id_pasien,
          'tanggal_kunjung' => Carbon::parse($request->tanggal_kunjung)->formatLocalized('%Y-%m-%d'),
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
              'tanggal_kunjung' => Carbon::parse($request->tanggal_kunjung)->formatLocalized('%Y-%m-%d'),
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

      }
      $jadwalpasien = jadwalpasien::find($id_pasien);
      $jadwalpasien->delete();
      if ($request->get('terjadwal') == 'terjadwal') {
       Alert::success('Pasien Berhasil Dijadwalkan','Terjadwal')->persistent("OK");
     } else {
      Alert::success('Data Berhasil Disimpan','Tersimpan')->persistent("OK");
    }
    return redirect('/home');
  }


  public function perbarui(Request $request, $id_pasien)
  {
    $this->validate($request,[
      'nama' => 'required',
      'gender'=>'required',
      'tempat_lahir'=>'required',
      'lahir' => 'required',
      'umur' => 'required',
      'pekerjaan' => 'required',
      'agama' => 'required',
      'telepon' => 'required',
      'status' => 'required',
      'alamat' => 'required'
    ]);

    $data = [
      'nama' => $request->nama,
      'gender'=>$request->gender,
      'tempat_lahir'=>$request->tempat_lahir,
      'tanggal_lahir' => $request->lahir,
      'umur' => $request->umur,
      'pekerjaan' => $request->pekerjaan,
      'agama' => $request->agama,
      'telepon' => $request->telepon,
      'status' => $request->status,
      'alamat' => $request->alamat
    ];

    $pasien = DB::table('pasien')->where('id_pasien','=', $id_pasien)->update($data);
    Alert::success('Data Berhasil Diupdate','Tersimpan')->persistent("OK");
    return redirect('datapasien');
  }
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id_pasien)
    {
      $pasien = pasien::where('id_pasien','=',$id_pasien);
      $pasien->delete();

      $jadwalpasien = jadwalpasien::where('id_pasien','=',$id_pasien);
      $jadwalpasien->delete();

      $detailpasien = detailpasien::where('id_pasien','=',$id_pasien);
      $detailpasien->delete();

      $obatpasien = obatpasien::where('id_pasien','=',$id_pasien);
      $obatpasien->delete();

      $terjadwal = terjadwal::where('id_pasien','=',$id_pasien);
      $terjadwal->delete();
      Alert::success('Data Berhasil Dihapus','Terhapus')->persistent("OK");
      return redirect('datapasien');
    }

    public function cetaksatu_pdf($id_pasien, $tanggal_kunjung)
    {
      $join = DB::table('detail_pasien')
      ->join('pasien','pasien.id_pasien','=','detail_pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','detail_pasien.id_dokter')
      ->where('detail_pasien.id_pasien','=', $id_pasien)
      ->first();

      $obat = DB::table('obat_pasien')
      ->join('obat','obat.id_obat','=','obat_pasien.id_obat')
      ->where('obat_pasien.tanggal_kunjung','=', $tanggal_kunjung)
      ->where('obat_pasien.id_pasien','=',$id_pasien)
      ->get();
      $i = 0;
      $pdf = PDF::loadview('pasien/cetak/satu',compact('join','obat','i'));
      $pdf->setPaper('a4', 'landscape');
      return $pdf->download(''.$join->nama.' ('.$id_pasien.')');
      // return view('pasien/cetak/satu',compact('join','obat'))->with('i');
    }
  }
