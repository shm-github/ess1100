<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sentences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('word_id')->index();
			$table->text('sentence_eng');
			$table->text('sentence_per');
			$table->string('sound_file_name');
			$table->string('deleted_word');
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
		Schema::drop('sentences');
	}

}
