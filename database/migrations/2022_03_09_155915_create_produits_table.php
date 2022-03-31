<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_produit', 100);
            $table->text('code_produit');
            $table->bigInteger('TVA')->default(0);
            $table->double('prix_HT')->default(0);
            $table->double('prix_TTC')->default(0);
            $table->double('prix_produit_HT')->default(0);
            $table->double('prix_produit_TTC')->default(0);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('categorie_id')->index('produits_categorie_id_foreign');
            $table->float('quantite', 10, 0)->default(0);
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
        Schema::dropIfExists('produits');
    }
}
