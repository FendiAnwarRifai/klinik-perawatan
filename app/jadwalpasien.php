<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwalpasien extends Model
{
	Protected $table ='jadwal_pasien';
	Protected $primaryKey ='id_pasien';
	Protected $fillable =['id_pasien','id_dokter','antrian','tanggal_kunjung'];
}
