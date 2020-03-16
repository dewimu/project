<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToPerawatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perawats', function (Blueprint $table) {
            $table->integer('id_dokter')->unsigned()->change();
            $table->foreign('id_dokter')->references('id')->on('dokters')
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
        Schema::table('perawats', function (Blueprint $table) {
            $table->dropForeign('perawats_id_dokter_foreign');
            $table->dropIndex('perawats_id_dokter_foreign');
            $table->integer('id_dokter')->change();
        });
    }
}
