<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFotografiaHasPessoasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fotografia_has_pessoas', function(Blueprint $table)
		{
			$table->integer('_id_pessoa_has_fotografia', true);
			$table->integer('_id_fotografia')->nullable()->index('_id_fotografia');
			$table->integer('_id_pessoa')->nullable()->index('_id_pessoa');
			$table->string('tipo_pessoa', 12)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fotografia_has_pessoas');
	}

}
