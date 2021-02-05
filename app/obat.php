<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
	Protected $table ='obat';
	Protected $primaryKey ='id_obat';
	Protected $fillable =['id_obat','nama_obat','stok','jenis_obat','harga'];
}
