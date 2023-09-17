<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_etudiant', 200);
            $table->string('adress', 200);
            $table->string('phone', 200);
            $table->string('email', 100);
            $table->date('date_de_naissance');
            $table->string('ville_id', 200);
            $table->foreign('ville_id')->references('id')->on('villes');
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
        Schema::dropIfExists('etudiant_models');
    }
}
