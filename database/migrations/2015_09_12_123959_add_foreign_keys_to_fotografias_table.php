<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFotografiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fotografias', function(Blueprint $table)
		{
			$table->foreign('bairro_id', 'fotografias_ibfk_1')->references('id')->on('bairros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('logradouro_id', 'fotografias_ibfk_2')->references('id')->on('logradouros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('cidade_id', 'fotografias_ibfk_3')->references('id')->on('cidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fotografias', function(Blueprint $table)
		{
			$table->dropForeign('fotografias_ibfk_1');
			$table->dropForeign('fotografias_ibfk_2');
			$table->dropForeign('fotografias_ibfk_3');
		});
	}

}
