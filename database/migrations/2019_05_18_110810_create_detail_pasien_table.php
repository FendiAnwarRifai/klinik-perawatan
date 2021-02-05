<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pasien', function (Blueprint $table) {
            $table->integer('id_detail');
            $table->integer('id_pasien');
            $table->string('tanggal_kunjung');
            $table->string('nama_pasien');
            $table->string('dokter');
            $table->string('tindakan');
            $table->timestamps();
            $table->softDeletes();
              $table->primary(['id_detail', 'id_pasien']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pasien');
    }
}
