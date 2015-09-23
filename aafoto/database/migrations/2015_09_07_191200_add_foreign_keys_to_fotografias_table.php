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
			$table->foreign('_id_bairro', 'fotografias_ibfk_1')->references('_id_bairro')->on('bairros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('_id_rua', 'fotografias_ibfk_2')->references('_id_rua')->on('ruas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('_id_cidade', 'fotografias_ibfk_3')->references('_id_cidade')->on('cidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
