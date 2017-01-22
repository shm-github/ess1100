<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainContextsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('main_contexts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('date_id');
			$table->string('title_eng');
			$table->string('title_per');
			$table->text('context_per');
			$table->text('context_eng');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('main_contexts');
	}

}
