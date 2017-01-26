<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdiomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('idioms', function(Blueprint $table)
		{
			$table->increments('id'       );
			$table->integer('date_id'      )->index();
			$table->string( 'idiom_eng'    );
			$table->string( 'idiom_eng_def');
			$table->string( 'idiom_per'      );
			$table->string( 'idiom_per_def' );
			$table->string( 'image' );
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
		Schema::drop('idioms');
	}

}
