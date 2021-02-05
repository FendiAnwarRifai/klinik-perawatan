<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class terjadwal extends Model
{
	Protected $table ='terjadwal';
	Protected $primaryKey ='id_terjadwal';
	Protected $fillable =['id_pasien','id_dokter','tanggal_kunjung','tanggal_terjadwal','jam_terjadwal'];
}
