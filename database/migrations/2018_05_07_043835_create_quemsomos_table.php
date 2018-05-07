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
            $table->string('razaosocial', 191);
            $table->string('nomefantasia', 191)->nullable();
            $table->string('cnpj', 18);
            $table->string('ie', 45);
            $table->string('missao', 2500);
            $table->string('visao', 2500);
            $table->string('valores', 2500);
            $table->text('quemsomos');
            $table->string('email', 255)->nullable();
            $table->string('telefone', 20);
            $table->string('fax', 20);
            $table->string('sac', 20);
            $table->string('endereco', 255);
            $table->string('bairro', 255);
            $table->string('cidade', 255);
            $table->string('estado', 255);
            $table->string('cep', 10);
            $table->string('facebook', 255);
            $table->string('instagram', 255);
            $table->string('youtube', 255);

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
        Schema::dropIfExists('quemsomos');
    }
}
