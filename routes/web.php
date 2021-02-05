<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::group(['middleware' => 'revalidate'], function()
{
Route::group(['middleware' => 'auth'], function () {
	Route::get('password.change', 'Auth\UbahPasswordController@change')->name('password.change');
	Route::put('password.update', 'Auth\UbahPasswordController@update')->name('password.update');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homes', 'HomeController@index2');

// terjadwal
Route::get('terjadwal', 'terjadwalController@index');
Route::get('list.{id_pasien}.{tanggal_kunjung}.view','terjadwalController@show');
Route::get('list.{id_pasien}.{tanggal_kunjung}.edit','terjadwalController@edit');
Route::post('terjadwal/{id_pasien}/{tanggal_kunjung}/update','terjadwalController@update');

// terjadwal hari ini
Route::get('now', 'terjadwalController@jadwal_hari_ini');
Route::get('now.{id_pasien}.{tanggal_kunjung}.ubah','terjadwalController@ubah');
Route::post('now/{id_pasien}/{tanggal_kunjung}/perbarui','terjadwalController@perbarui');

// obat
Route::get('obathome', 'obatController@index');
Route::get('create_obat','obatController@create');
Route::post('tambahobat','obatController@store');
Route::get('obat.{id_obat}.edit','obatController@edit');
Route::post('obat/{id_obat}/update','obatController@update');
Route::post('obat/{id_obat}/hapus','obatController@destroy');

// dokter
Route::get('/datadokter', 'datadokterController@index');
Route::get('create', 'datadokterController@create');
Route::post('tambahdokter', 'datadokterController@store');
Route::get('dokter.{id_dokter}.edit','datadokterController@edit');
Route::post('dokter/{id_dokter}/update', 'datadokterController@update');
Route::get('dokter.{id_dokter}.lihat','datadokterController@show');
Route::post('dokter/{id_dokter}/destroy','datadokterController@destroy');

// select dependent
Route::get('select','datapasienController@fetch')->name('dynamicdependent.fetch');

// pasien
Route::get('datapasien','datapasienController@index');
Route::get('datalama','datapasienController@buat');
Route::post('pasien_simpan', 'datapasienController@simpan');
Route::get('pasien.{id_pasien}.lihat','datapasienController@lihat');
Route::get('pasien.{id_pasien}.{tanggal_kunjung}.detail_obat','datapasienController@detail_obat');
Route::get('pasien.{id_pasien}.edit_pasien','datapasienController@edit_pasien');
Route::post('pasien/{id_pasien}/save_data_pasien','datapasienController@perbarui');
Route::post('pasien/{id_pasien}/hapus','datapasienController@destroy');

// select sort by on antrian pasien hari ini
Route::get('tindakan','HomeController@index');

// antrian pasien
Route::get('pasientambah','datapasienController@create');
Route::post('pasien_store', 'datapasienController@store');
Route::get('jadwal_pasien.{id_pasien}.edit', 'datapasienController@edit');
Route::post('edit_pasien/{id_pasien}/save','datapasienController@update');
Route::get('antrian_pasien.{id_pasien}.view','datapasienController@show');

// cetak data pasien
Route::post('cetak/{id_pasien}/{tanggal_kunjung}/satu', 'datapasienController@cetaksatu_pdf');


//cetak semua data pasien yang dipilihh mnurut tanggal awal dan tanggal akhir
Route::get('index','cetakpasienController@index');
Route::post('cetak_semua','cetakpasienController@cetak');
});