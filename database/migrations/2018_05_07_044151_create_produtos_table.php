<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->text('descricao')->nullable();
            $table->integer('linha_id')->unsigned();
            $table->text('indicacoes', 500)->nullable();
            $table->text('mododeusar', 500)->nullable();
            $table->string('slug')->unique();
            $table->string('imagem', 1000);
            $table->decimal('calcio', 6, 4)->nullable();
            $table->decimal('fosforo', 6, 4)->nullable();
            $table->decimal('enxofre', 6, 4)->nullable();
            $table->decimal('magnesio', 6, 4)->nullable();
            $table->decimal('manganes', 6, 4)->nullable();
            $table->decimal('zinco', 6, 4)->nullable();
            $table->decimal('cobre', 6, 4)->nullable();
            $table->decimal('cobalto', 6, 4)->nullable();
            $table->decimal('iodo', 6, 4)->nullable();
            $table->decimal('selenio', 6, 4)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('linha_id')->references('id')->on('linhas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
