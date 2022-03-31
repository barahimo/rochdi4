<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 30)->nullable();
            $table->date('date')->nullable();
            $table->double('total_HT')->default(0);
            $table->double('total_TVA')->default(0);
            $table->double('total_TTC')->default(0);
            $table->unsignedBigInteger('commande_id')->index('factures_commande_id_foreign');
            $table->string('reglement', 20);
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
        Schema::dropIfExists('factures');
    }
}
