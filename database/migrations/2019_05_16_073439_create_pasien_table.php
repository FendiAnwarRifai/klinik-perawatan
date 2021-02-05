<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
          $table->integer('id_pasien');
          $table->integer('id');
          $table->string('nama');
          $table->string('gender');
          $table->string('tanggal_lahir');
          $table->text('alamat');
          $table->timestamps();
          $table->softDeletes();
          $table->primary(['id_pasien','id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
