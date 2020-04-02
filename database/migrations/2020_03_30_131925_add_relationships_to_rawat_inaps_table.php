<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToRawatInapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inaps', function (Blueprint $table) {
            $table->integer('id_status')->unsigned()->change();
            $table->foreign('id_status')->references('id')->on('statuses')
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
        Schema::table('rawat_inaps', function (Blueprint $table) {
            $table->dropForeign('rawat_inaps_id_status_foreign');
            $table->dropIndex('rawat_inaps_id_status_foreign');
            $table->integer('id_status')->change();
        });
    }
}
