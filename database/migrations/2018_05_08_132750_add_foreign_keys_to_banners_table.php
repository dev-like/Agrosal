<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table -> foreign('noticias_id')->references('id')->on('noticias')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table -> foreign('produtos_id')->references('id')->on('produtos')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table -> foreign('linhas_id')->references('id')->on('linhas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropIfExists('fk_banners_noticias');
            $table->dropIfExists('fk_banners_produtos');
            $table->dropIfExists('fk_banners_linhas');
        });
    }
}
