<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreenShotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('screen_shots', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('all_pages');
			$table->boolean('splash_page');
			$table->boolean('weeks_page');
			$table->boolean('days_page');
			$table->boolean('vocabularies_page');
			$table->boolean('exercise1_page');
			$table->boolean('exercise2_page');
			$table->boolean('exercise3_page');
			$table->boolean('exercise4_page');
			$table->boolean('exercise5_page');
			$table->boolean('exercise6_page');
			$table->boolean('exercise7_page');
			$table->boolean('exercise8_page');
			$table->boolean('exercise9_page');
			$table->boolean('exercise10_page');
			$table->boolean('main_context_page');
			$table->boolean('rev_page');
			$table->boolean('score_page');
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
		Schema::drop('screen_shots');
	}

}
