<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->foreign('taxe_id', 'fk_tx')->references('id')->on('taxes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('vehicule_id', 'fk_vhc')->references('id')->on('vehicules')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->dropForeign('fk_tx');
            $table->dropForeign('fk_vhc');
        });
    }
}
