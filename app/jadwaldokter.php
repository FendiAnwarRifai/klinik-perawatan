<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwaldokter extends Model
{
	Protected $table ='jadwal_dokter';
	Protected $primaryKey ='id_dokter';
	Protected $fillable =['id_dokter','id','hari_awal','hari_akhir','jam_mulai','jam_selesai'];
}
