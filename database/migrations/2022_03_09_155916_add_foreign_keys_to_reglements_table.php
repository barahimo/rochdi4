<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reglements', function (Blueprint $table) {
            $table->foreign(['commande_id'])->references(['id'])->on('commandes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reglements', function (Blueprint $table) {
            $table->dropForeign('reglements_commande_id_foreign');
        });
    }
}
