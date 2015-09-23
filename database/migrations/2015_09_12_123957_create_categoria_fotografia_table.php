<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriaFotografiaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria_fotografia', function(Blueprint $table)
		{
			$table->integer('fotografia_id')->default(0);
			$table->integer('categoria_id')->default(0)->index('categoria_id');
			$table->primary(['fotografia_id','categoria_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categoria_fotografia');
	}

}
