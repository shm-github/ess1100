<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordSearchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('word_searches', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('date_id');
            $table->integer('week_id');
            $table->integer('paragraph_number');
            $table->text('paragraph_eng');
            $table->text('paragraph_per');
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
		Schema::drop('word_searches');
	}

}
