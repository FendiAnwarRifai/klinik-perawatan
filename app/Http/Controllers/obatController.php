<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obat;
use Illuminate\Support\Facades\DB;
use Alert;
class obatController extends Controller
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
      $b = 1;
      $d = 0;
      $obat = DB::table('obat')->get();
      return view('obat.dataobat', compact('obat','b','d'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('obat.create');
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
        'nama_obat' => 'required',
        'stok'=>'required',
        'jenis_obat' => 'required',
        'harga' => 'required'
      ]);
      
      if (count($request->jenis_obat) > 0 ){
        foreach ($request->jenis_obat as $item => $v) {
          $harga = $request->harga[$item];
          $harga_str = preg_replace("/[^0-9]/", "", $harga);
          $obat = array(
            'nama_obat' => $request->nama_obat[$item],
            'stok'=> $request->stok[$item],
            'jenis_obat'=> $request->jenis_obat[$item],
            'harga'=> $harga_str
          );
          obat::create($obat);
        }
      }
      
      Alert::success('Data Yang Anda Inputkan Berhasil Di Tambahkan','Tersimpan')->persistent("OK");
      return redirect('obathome');
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
    public function edit($id_obat)
    {
      $obat = obat::where('id_obat','=',$id_obat)->first();
      return view('obat.edit',compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_obat)
    {
      $this->validate($request,[
        'nama_obat' => 'required',
        'stok'=>'required',
        'jenis_obat' => 'required',
        'harga' => 'required'
      ]);
      $harga = $request->harga;
      $hrg = preg_replace("/[^0-9]/", "", $harga);
      obat::where('id_obat','=', $id_obat)->update(['nama_obat' => $request->nama_obat,
        'stok' => $request->stok,
        'harga' => $hrg]);
      Alert::success('Data Berhasil Di Update','Tersimpan')->persistent("OK");
      return redirect('obathome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_obat)
    {
      obat::find($id_obat)->delete();
      Alert::success('Data Berhasil Di Hapus','Terhapus')->persistent("OK");
      return redirect('obathome');
    }
  }
