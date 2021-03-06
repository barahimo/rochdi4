<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPayementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payements', function (Blueprint $table) {
            $table->foreign(['demande_id'])->references(['id'])->on('demandes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payements', function (Blueprint $table) {
            $table->dropForeign('payements_demande_id_foreign');
        });
    }
}
