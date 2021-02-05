<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_pasien', function (Blueprint $table) {
          $table->integer('id');
            $table->integer('id_pasien');
            $table->integer('id_obat');
            $table->integer('jumlah');
            $table->double('harga');
            $table->timestamps();
            $table->softDeletes();
              $table->primary(['id','id_pasien']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_pasien');
    }
}
