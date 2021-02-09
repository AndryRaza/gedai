<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('type_beneficiaire_id');

            $table->string('nom');
            $table->string('prenom');
            $table->string('organisme');
            $table->string('adresse');
            $table->integer('tel_fixe');
            $table->integer('tel_mobile');
            $table->string('email');
       

            $table->string('etat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaires');
    }
}
