<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFotografiaPessoaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fotografia_pessoa', function(Blueprint $table)
		{
			$table->foreign('fotografia_id', 'fotografia_pessoa_ibfk_1')->references('id')->on('fotografias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('pessoa_id', 'fotografia_pessoa_ibfk_2')->references('id')->on('pessoas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fotografia_pessoa', function(Blueprint $table)
		{
			$table->dropForeign('fotografia_pessoa_ibfk_1');
			$table->dropForeign('fotografia_pessoa_ibfk_2');
		});
	}

}
