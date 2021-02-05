<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwaldokter;
use App\dokter;
use Illuminate\Support\Facades\DB;
use Alert;
class datadokterController extends Controller
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
    $b = 1;
    $d = 0;
    $dokter = DB::table('dokter')
    ->latest()
    ->paginate();
    return view('dokter.grid',compact('dokter','b','d'))->with('i');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('dokter.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $i = 0;
    $row = DB::table('jadwal_dokter')->count();

    $dokter = dokter::create([
      'nama_dokter' => request('nama'),
      'spesialis' => request('spesialis')
    ])->id_dokter;

    if (count($request->hari_awal) > 0 ){
      foreach ($request->hari_awal as $item => $v) {
        $jadwaldokter= array(
          'id_dokter' => $dokter,
          'id_jadwal'=> ++$i+$row,
          'hari_awal'=> $request->hari_awal[$item],
          'hari_akhir'=> $request->hari_akhir[$item],
          'jam_mulai'=> $request->jam_mulai[$item],
          'jam_selesai'=> $request->jam_selesai[$item]
        );
        jadwaldokter::create($jadwaldokter);
      }
    }
    Alert::success('Data Yang Anda Inputkan Berhasil Di Tambahkan','Tersimpan')->persistent("OK");
    return redirect('/datadokter');
  }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id_dokter)
    {
      $dokter = dokter::find($id_dokter);
      $jadwal = DB::table('jadwal_dokter')
      ->where('id_dokter','=',$id_dokter)
      ->paginate();
      return view('dokter/view',compact('dokter','jadwal'))->with('i');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id_dokter)
    {
      $dokter = dokter::find($id_dokter);
      $jadwal = DB::table('jadwal_dokter')
      ->where('id_dokter','=',$id_dokter)
      ->paginate();
      $hapus = 0;
      $terhapus = 1;
      return view('dokter.edit',compact('dokter','jadwal','hapus','terhapus'))->with('i');
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id_dokter)
    {
      $i = 0;
      $row = DB::table('jadwal_dokter')->count();
      $dokter = dokter::create([
        'nama_dokter' => request('nama'),
        'spesialis' => request('spesialis')
      ])->id_dokter;

      if (count($request->hari_awal) > 0 ){
        foreach ($request->hari_awal as $item => $v) {
          $jadwaldokter= array(
            'id_dokter' => $dokter,
            'id_jadwal'=> ++$i+$row,
            'hari_awal'=> $request->hari_awal[$item],
            'hari_akhir'=> $request->hari_akhir[$item],
            'jam_mulai'=> $request->jam_mulai[$item],
            'jam_selesai'=> $request->jam_selesai[$item]
          );
          jadwaldokter::create($jadwaldokter);
        }
      }
      $dokter = dokter::where('id_dokter','=',$id_dokter);
      $dokter->delete();
      $jadwaldokter = jadwaldokter::where('id_dokter','=',$id_dokter);
      $jadwaldokter->delete();
      Alert::success('Data Berhasil Di Update','Tersimpan')->persistent("OK");
      return redirect('/datadokter');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id_dokter)
    {
      $dokter = dokter::find($id_dokter);
      $dokter->delete();
      $jadwaldokter = jadwaldokter::find($id_dokter);
      $jadwaldokter->delete();
      Alert::success('Data Berhasil Di Hapus','Terhapus')->persistent("OK");
      return redirect('/datadokter');
    }
  }
