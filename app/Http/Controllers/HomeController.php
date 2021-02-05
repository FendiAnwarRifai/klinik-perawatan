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
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
    $b = 1;
    $d = 0;
    $a=0;
    $sekarang = date('Y-m-d');
    $tindakan = $request->get('tindakan');
    $dok = DB::table('dokter')->distinct()->get(['spesialis']);

    if($tindakan == 'all') {
      return redirect('/home');
    }
    else if ($request->get('tindakan')) {
      $join = DB::table('pasien')
      ->join('jadwal_pasien','jadwal_pasien.id_pasien','=','pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','jadwal_pasien.id_dokter')
      ->where('tanggal_kunjung','=',$sekarang)
      ->where('spesialis','=',$tindakan)
      ->get();
    } else {
      $join = DB::table('pasien')
      ->join('jadwal_pasien','jadwal_pasien.id_pasien','=','pasien.id_pasien')
      ->join('dokter','dokter.id_dokter','=','jadwal_pasien.id_dokter')
      ->where('tanggal_kunjung','=',$sekarang)
      ->get();
    }
        return view('home',compact('pasien','join','a','dok','b','d'))->with('i');
    }
     public function index2()
         {
           Alert::success('Anda Berhasil Login','selamat')->persistent("OK");
           return Redirect('/home');
         }
}
