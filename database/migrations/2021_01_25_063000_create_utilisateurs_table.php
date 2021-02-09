<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('role_id');
            $table->integer('service_id')->nullable();

            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('mot_de_passe');
            $table->integer('telephone');
            $table->integer('etat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
