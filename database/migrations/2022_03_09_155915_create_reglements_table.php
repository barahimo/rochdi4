<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 30);
            $table->date('date');
            $table->string('mode_reglement', 30);
            $table->double('avance')->default(0);
            $table->double('reste')->default(0);
            $table->string('status', 30);
            $table->unsignedBigInteger('commande_id')->index('reglements_commande_id_foreign');
            $table->integer('user_id')->default(1);
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
        Schema::dropIfExists('reglements');
    }
}
