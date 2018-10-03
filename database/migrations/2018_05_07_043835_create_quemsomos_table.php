<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuemsomosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quemsomos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razaosocial', 191)->nullable();
            $table->string('nomefantasia', 191);
            $table->string('cnpj', 18)->nullable();
            $table->string('ie', 45)->nullable();            
            $table->text('quemsomos')->nullable();
            $table->string('email', 255);
            $table->string('telefone', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('sac', 20)->nullable();
            $table->string('endereco', 255)->nullable();
            $table->string('bairro', 255)->nullable();
            $table->string('cidade', 255)->nullable();
            $table->string('estado', 255)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('youtube', 255)->nullable();

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
        Schema::dropIfExists('quemsomos');
    }
}
