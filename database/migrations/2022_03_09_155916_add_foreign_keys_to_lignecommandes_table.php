<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLignecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lignecommandes', function (Blueprint $table) {
            $table->foreign(['commande_id'])->references(['id'])->on('commandes')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('lignecommandes', function (Blueprint $table) {
            $table->dropForeign('lignecommandes_commande_id_foreign');
            $table->dropForeign('lignecommandes_produit_id_foreign');
        });
    }
}
