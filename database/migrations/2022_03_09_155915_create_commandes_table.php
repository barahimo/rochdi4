<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 30);
            $table->date('date');
            $table->json('vision_loin')->nullable();
            $table->json('vision_pres')->nullable();
            $table->double('total')->nullable();
            $table->double('avance')->nullable();
            $table->double('reste')->nullable();
            $table->string('facture', 30);
            $table->unsignedBigInteger('client_id')->index('commandes_client_id_foreign');
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
        Schema::dropIfExists('commandes');
    }
}
