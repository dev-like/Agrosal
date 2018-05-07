<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cliente', function(Blueprint $table)
		{
		  $table->increments('id');
			$table->string('cpfcnpj', 23)->nullable();
			$table->string('razaosocial', 191);
			$table->string('nomefantasia', 191);
			$table->string('cep', 10)->nullable();
			$table->string('logradouro', 191)->nullable();
			$table->string('numero', 10)->nullable();
			$table->string('complemento', 191)->nullable();
			$table->string('bairro', 191)->nullable();
			$table->string('cidade', 191)->nullable();
			$table->char('uf', 2)->nullable();
			$table->string('obs', 191)->nullable();
			$table->string('rep_nome', 191)->nullable();
			$table->string('rep_cpf', 14)->nullable();
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
		Schema::dropIfExists('cliente');
	}

}
