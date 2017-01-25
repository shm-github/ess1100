<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('word_forms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('word_id')->index();
			$table->string('word');
			$table->string('sound_file_name');
			$table->boolean('is_verb');
			$table->boolean('is_adv');
			$table->boolean('is_noun');
			$table->boolean('is_adj');
			$table->text('sentence');
			$table->text('sentence_per');
			$table->text('word_def');
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
		Schema::drop('word_forms');
	}

}
