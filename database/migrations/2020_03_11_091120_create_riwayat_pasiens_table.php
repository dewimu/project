<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pasiens', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_pasien');
            $table->integer('id_dokter');
            $table->string('diagnosa_penyakit');
            $table->integer('id_status');
            $table->integer('id_rawat_inap');
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
        Schema::dropIfExists('riwayat_pasiens');
    }
}
