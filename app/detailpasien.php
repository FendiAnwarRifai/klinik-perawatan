<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailpasien extends Model
{
	Protected $table ='detail_pasien';
	Protected $primaryKey ='id_pasien';
	Protected $fillable =['id_pasien','id_dokter','tanggal_kunjung','catatan'];
}
