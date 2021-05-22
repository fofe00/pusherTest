<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("label",255);
            $table->text("categorie_client")->nullable(true);
            $table->text("proposition_de_valeur")->nullable(true);
            $table->text("reseau_de_distribition")->nullable(true);
            $table->text("relation_client")->nullable(true);
            $table->text("Sources_de_revenu")->nullable(true);
            $table->text("matiere_premiere")->nullable(true);
            $table->text("activite_cle")->nullable(true);
            $table->text("partenaire")->nullable(true);
            $table->text("liste_de_depense")->nullable(true);
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::dropIfExists('projects');
    }
}
