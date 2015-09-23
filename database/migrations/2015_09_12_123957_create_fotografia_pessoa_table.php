<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFotografiaPessoaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fotografia_pessoa', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('fotografia_id')->nullable()->index('fotografia_id');
			$table->integer('pessoa_id')->nullable()->index('pessoa_id');
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
		Schema::drop('fotografia_pessoa');
	}

}
