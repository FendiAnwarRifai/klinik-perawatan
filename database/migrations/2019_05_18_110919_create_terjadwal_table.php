<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerjadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terjadwal', function (Blueprint $table) {
            $table->integer('id_terjadwal');
            $table->integer('id_pasien');
            $table->string('tanggal_kunjung');
            $table->string('dokter');
            $table->string('tindakan');
            $table->string('tanggal_terjadwal');
            $table->time('jam_terjadwal');
            $table->primary(['id_terjadwal', 'id_pasien']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terjadwal');
    }
}
