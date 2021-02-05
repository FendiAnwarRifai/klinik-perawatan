<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
	Protected $table ='dokter';
	Protected $primaryKey ='id_dokter';
	Protected $fillable =['id_dokter','nama_dokter','spesialis'];
}
