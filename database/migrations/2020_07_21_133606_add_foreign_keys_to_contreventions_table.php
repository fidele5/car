<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToContreventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contreventions', function (Blueprint $table) {
            $table->foreign('camera_id', 'fk_cmra')->references('id')->on('cameras')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('taxe_id', 'fk_txe')->references('id')->on('taxes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('vehicule_id', 'fk_vhcul')->references('id')->on('vehicules')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contreventions', function (Blueprint $table) {
            $table->dropForeign('fk_cmra');
            $table->dropForeign('fk_txe');
            $table->dropForeign('fk_vhcul');
        });
    }
}
