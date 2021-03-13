<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero_plaque', 255)->unique('numero_UNIQUE');
            $table->string('image', 255);
            $table->string('num_chassis', 65)->nullable();
            $table->string('file_document', 255)->nullable();
            $table->integer('annee')->nullable();
            $table->integer('categorie_id')->nullable()->index('fk_categorie_idx');
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
        Schema::dropIfExists('vehicules');
    }
}
