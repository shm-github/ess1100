<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordSearchDeletedWordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('word_search_deleted_words', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('word_search_id');
			$table->integer('paragraph_number');
			$table->text('deleted_word');
            $table->text('hint');
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
		Schema::drop('word_search_deleted_words');
	}

}
