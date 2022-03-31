<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 30);
            $table->string('facture', 30)->nullable();
            $table->date('date');
            $table->double('total')->nullable();
            $table->double('avance')->nullable();
            $table->double('reste')->nullable();
            $table->unsignedBigInteger('fournisseur_id')->index('demandes_fournisseur_id_foreign');
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
        Schema::dropIfExists('demandes');
    }
}
