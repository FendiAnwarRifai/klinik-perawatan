<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
	Protected $table ='pasien';
	Protected $primaryKey ='id_pasien';
	Protected $fillable =['id_pasien','nama','gender','tempat_lahir','tanggal_lahir','umur','pekerjaan','agama','telepon','status','alamat'];
}
