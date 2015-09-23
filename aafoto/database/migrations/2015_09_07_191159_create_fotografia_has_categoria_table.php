<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFotografiaHasCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fotografia_has_categoria', function(Blueprint $table)
		{
			$table->integer('_id_fotografia')->nullable()->index('_id_fotografia');
			$table->integer('_id_categoria')->nullable()->index('_id_categoria');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fotografia_has_categoria');
	}

}
