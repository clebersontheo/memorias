<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoriaFotografiaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categoria_fotografia', function(Blueprint $table)
		{
			$table->foreign('fotografia_id', 'categoria_fotografia_ibfk_1')->references('id')->on('fotografias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('categoria_id', 'categoria_fotografia_ibfk_2')->references('id')->on('categorias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categoria_fotografia', function(Blueprint $table)
		{
			$table->dropForeign('categoria_fotografia_ibfk_1');
			$table->dropForeign('categoria_fotografia_ibfk_2');
		});
	}

}
