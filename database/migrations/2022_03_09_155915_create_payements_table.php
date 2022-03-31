<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 30);
            $table->date('date');
            $table->string('mode_payement', 30);
            $table->double('avance')->default(0);
            $table->double('reste')->default(0);
            $table->string('status', 30);
            $table->unsignedBigInteger('demande_id')->index('payements_demande_id_foreign');
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
        Schema::dropIfExists('payements');
    }
}
