<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAirportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('airport', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 3)->unique('idx_airportCode');
			$table->string('city');
			$table->string('name', 150);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('airport');
	}

}
