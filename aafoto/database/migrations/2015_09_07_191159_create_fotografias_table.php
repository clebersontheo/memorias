<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFotografiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fotografias', function(Blueprint $table)
		{
			$table->integer('_id_fotografia', true);
			$table->integer('_id_bairro')->nullable()->index('_id_bairro');
			$table->integer('_id_rua')->nullable()->index('_id_rua');
			$table->integer('_id_cidade')->nullable()->index('_id_cidade');
			$table->string('caminho_alta_resolucao')->nullable();
			$table->string('caminho_baixa_resolucao')->nullable();
			$table->text('nome_fotografia', 65535)->nullable();
			$table->text('producao', 65535)->nullable();
			$table->text('descricao', 65535)->nullable();
			$table->integer('conservacao')->nullable();
			$table->string('cor', 13)->nullable();
			$table->text('pessoas_presente', 65535)->nullable();
			$table->date('ano')->nullable();
			$table->text('referencia', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fotografias');
	}

}
