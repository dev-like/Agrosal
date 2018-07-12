<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacoesnutricionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacoesnutricionais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('elemento', 255)->nullable();
            $table->string('valores', 255)->nullable();
            $table->integer('produtos_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('produtos_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacoesnutricionais');
    }
}
