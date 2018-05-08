<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 255)->nullable;
            $table->string('descricao', 255);
            $table->string('imagem', 1000);
            $table->string('razaosocial', 191);
            $table->integer('ordem');
            $table->integer('noticias_id')->unsigned();
            $table->integer('produtos_id')->unsigned();
            $table->integer('linhas_id')->unsigned();

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
        Schema::dropIfExists('banners');
    }
}
