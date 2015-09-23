<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFotografiaHasPessoasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fotografia_has_pessoas', function(Blueprint $table)
		{
			$table->foreign('_id_fotografia', 'fotografia_has_pessoas_ibfk_1')->references('_id_fotografia')->on('fotografias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('_id_pessoa', 'fotografia_has_pessoas_ibfk_2')->references('_id_pessoa')->on('pessoas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fotografia_has_pessoas', function(Blueprint $table)
		{
			$table->dropForeign('fotografia_has_pessoas_ibfk_1');
			$table->dropForeign('fotografia_has_pessoas_ibfk_2');
		});
	}

}
