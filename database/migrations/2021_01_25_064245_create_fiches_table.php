<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            /*Clés étrangères */ 

            $table->integer('service_id')->nullable();
            $table->integer('utilisateur_id')->nullable();

            $table->integer('categorie_id');
            $table->integer('sous_categorie_id');
            $table->integer('beneficiaire_id');
            $table->integer('nature_acte_id');

            $table->date('date_enregistrement');
            $table->date('date_acte');
            $table->string('numero_acte');
            $table->string('url_pdf');

            $table->float('montant_aide');
            $table->string('tags');
            $table->text('commentaire');

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
        Schema::dropIfExists('fiches');
    }
}
