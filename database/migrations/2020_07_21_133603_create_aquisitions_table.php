<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAquisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aquisitions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('date_acquisition');
            $table->string('type', 45);
            $table->integer('vehicule_id')->nullable()->index('fk_vhicule_idx');
            $table->integer('user_id')->nullable()->index('fk_user_idx');
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
        Schema::dropIfExists('aquisitions');
    }
}
