<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAquisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aquisitions', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_user')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('vehicule_id', 'fk_vhicule')->references('id')->on('vehicules')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aquisitions', function (Blueprint $table) {
            $table->dropForeign('fk_user');
            $table->dropForeign('fk_vhicule');
        });
    }
}
