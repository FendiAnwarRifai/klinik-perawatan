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
class cetakpasienController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->middleware('auth');
}


public function index()
{
    $pasien = DB::table('pasien')->get();
    return view('pasien/cetak/cetak_pasien', compact('pasien'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak(Request $request)
    {
        if (Carbon::parse($request->tanggal_awal)->formatLocalized('%Y%m%d') > Carbon::parse($request->tanggal_akhir)->formatLocalized('%Y%m%d')) {
            Alert::warning('Tanggal Awal Tidak Boleh Melebihi Tanggal Akhir!!','Warning!!')->persistent("OK");
            return redirect('index');
        }else{

            $tanggal_awal = Carbon::parse($request->tanggal_awal)->formatLocalized('%Y-%m-%d');
            $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->formatLocalized('%Y-%m-%d');
            $id_pasien = $request->id_pasien;

            $pasien = DB::table('pasien')->where('id_pasien','=',$id_pasien)->first();

            $detail = DB::table('pasien')
            ->join('detail_pasien','detail_pasien.id_pasien','=','pasien.id_pasien')
            ->join('dokter','dokter.id_dokter','=','detail_pasien.id_dokter')
            ->where('detail_pasien.tanggal_kunjung','>=',$tanggal_awal)
            ->Where('detail_pasien.tanggal_kunjung','<=', $tanggal_akhir)
            ->where('pasien.id_pasien','=',$id_pasien)
            ->get();


            $i = 0;
            $pdf = PDF::loadview('pasien/cetak/semua',compact('pasien','detail','tanggal_awal','tanggal_akhir','id_pasien','i'));
            $pdf->setPaper('a4', 'landscape');
            return $pdf->download(''.$pasien->nama.' ('.$id_pasien.')');
            // return view('pasien/cetak/semua',compact('pasien','detail','tanggal_awal','tanggal_akhir','id_pasien','i'));
        }
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
