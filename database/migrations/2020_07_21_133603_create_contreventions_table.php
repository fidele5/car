<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContreventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contreventions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('capture', 255);
            $table->dateTime('created');
            $table->integer('taxe_id')->nullable()->index('fk_txe_idx');
            $table->integer('vehicule_id')->nullable()->index('fk_vhcul_idx');
            $table->integer('camera_id')->nullable()->index('fk_cmra_idx');
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
        Schema::dropIfExists('contreventions');
    }
}
