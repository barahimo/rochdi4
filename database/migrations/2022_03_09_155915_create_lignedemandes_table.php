<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignedemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignedemandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('demande_id')->index('lignedemandes_demande_id_foreign');
            $table->unsignedBigInteger('produit_id')->index('lignedemandes_produit_id_foreign');
            $table->double('prix')->default(0);
            $table->float('quantite', 10, 0)->default(0);
            $table->double('total_produit')->nullable();
            $table->integer('user_id')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lignedemandes');
    }
}
