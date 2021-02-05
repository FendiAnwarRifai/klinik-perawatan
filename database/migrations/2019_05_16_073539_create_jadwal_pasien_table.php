<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pasien', function (Blueprint $table) {
          $table->integer('id');
          $table->integer('id_pasien');
          $table->string('nama_dokter');
          $table->string('tindakan');
          $table->integer('antrian');
          $table->timestamps();
          $table->softDeletes();
          $table->primary(['id', 'id_pasien']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pasien');
    }
}
