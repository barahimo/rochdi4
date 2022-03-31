<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLignedemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lignedemandes', function (Blueprint $table) {
            $table->foreign(['demande_id'], 'lignedemandes_commande_id_foreign')->references(['id'])->on('demandes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['produit_id'])->references(['id'])->on('produits')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lignedemandes', function (Blueprint $table) {
            $table->dropForeign('lignedemandes_commande_id_foreign');
            $table->dropForeign('lignedemandes_produit_id_foreign');
        });
    }
}
