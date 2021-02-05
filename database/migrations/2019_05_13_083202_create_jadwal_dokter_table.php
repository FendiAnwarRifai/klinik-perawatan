<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalDokterTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('jadwal_dokter', function (Blueprint $table) {
      $table->integer('id');
      $table->integer('id_dokter');
      $table->string('hari_awal');
      $table->string('hari_akhir');
      $table->time('jam_mulai');
      $table->time('jam_selesai');
      $table->timestamps();
      $table->softDeletes();
      $table->primary(['id','id_dokter']);
    });

  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('jadwal_dokter');
  }
}
