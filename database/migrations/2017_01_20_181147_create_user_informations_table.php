<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_informations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('device_IMEI');
			$table->string('screen_resolution');
			$table->integer('device_brand_id');
			$table->string('device_name');
			$table->integer('os_name_id');
			$table->integer('os_version_id');
			$table->boolean('is_activated');
			$table->boolean('user_online_state');
			$table->date('install_date');
			$table->date('activate_date');
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
		Schema::drop('user_informations');
	}

}
