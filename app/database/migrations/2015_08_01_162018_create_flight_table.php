<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlightTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flight', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tripId')->unsigned()->index('fk_flightsTripId_tripsId');
			$table->integer('originAirportId')->unsigned()->index('fk_flightsOriginAirportId_airportId');
			$table->integer('destAirportId')->unsigned()->index('fk_flightsDestinationAirportId_airportId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flight');
	}

}
