<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obatpasien extends Model
{
	Protected $table ='obat_pasien';
	Protected $primaryKey ='id_pasien';
	Protected $fillable =['id_pasien','id_obat','jumlah','harga','tanggal_kunjung'];
}
