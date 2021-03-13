<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('date');
            $table->integer('camera_id')->nullable()->index('fk_camera_idx');
            $table->integer('poste_id')->nullable()->index('fk_pst_idx');
            $table->integer('user_id')->nullable()->index('fk_souscriptions_utilisateurs1_idx');
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
        Schema::dropIfExists('souscriptions');
    }
}
