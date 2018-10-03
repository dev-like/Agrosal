<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposToQuemsomos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('quemsomos', function (Blueprint $table) {
        $table->string('tradicao', 2500)->nullable();
        $table->string('tecnologia', 2500)->nullable();
        $table->string('inovacao', 2500)->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('quemsomos', function (Blueprint $table) {
        $table->dropColumn('quemsomos');
    });
    }
}
