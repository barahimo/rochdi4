<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo', 100)->nullable();
            $table->string('nom', 30)->nullable();
            $table->text('adresse')->nullable();
            $table->string('code_postal', 30)->nullable();
            $table->string('ville', 30)->nullable();
            $table->string('pays', 30)->nullable();
            $table->string('tel', 30)->nullable();
            $table->string('site', 30)->nullable();
            $table->string('email', 30)->nullable();
            $table->text('note')->nullable();
            $table->string('iff', 30)->nullable();
            $table->string('ice', 30)->nullable();
            $table->string('capital', 30)->nullable();
            $table->string('rc', 30)->nullable();
            $table->string('patente', 30)->nullable();
            $table->string('cnss', 30)->nullable();
            $table->string('banque', 30)->nullable();
            $table->string('rib', 40)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
