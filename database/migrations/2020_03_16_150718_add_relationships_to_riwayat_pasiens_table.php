<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToRiwayatPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riwayat_pasiens', function (Blueprint $table) {
            $table->integer('id_pasien')->unsigned()->change();
            $table->foreign('id_pasien')->references('id')->on('pasiens')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_dokter')->unsigned()->change();
            $table->foreign('id_dokter')->references('id')->on('dokters')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_status')->unsigned()->change();
            $table->foreign('id_status')->references('id')->on('statuses')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_rawat_inap')->unsigned()->change();
            $table->foreign('id_rawat_inap')->references('id')->on('rawat_inaps')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_pasiens', function (Blueprint $table) {
            $table->dropForeign('riwayat_pasiens_id_pasien_foreign');
            $table->dropIndex('riwayat_pasiens_id_pasien_foreign');
            $table->integer('id_pasien')->change();

            $table->dropForeign('riwayat_pasiens_id_dokter_foreign');
            $table->dropIndex('riwayat_pasiens_id_dokter_foreign');
            $table->integer('id_dokter')->change();

            $table->dropForeign('riwayat_pasiens_id_status_foreign');
            $table->dropIndex('riwayat_pasiens_id_status_foreign');
            $table->integer('id_status')->change();

            $table->dropForeign('riwayat_pasiens_id_rawat_inap_foreign');
            $table->dropIndex('riwayat_pasiens_id_rawat_inap_foreign');
            $table->integer('id_rawat_inap')->change();
        });
    }
}
