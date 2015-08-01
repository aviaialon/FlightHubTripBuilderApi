<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFlightTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('flight', function(Blueprint $table)
		{
			$table->foreign('tripId', 'fk_flightsTripId_tripsId')->references('id')->on('trip')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('destAirportId', 'fk_flightsDestinationAirportId_airportId')->references('id')->on('airport')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('originAirportId', 'fk_flightsOriginAirportId_airportId')->references('id')->on('airport')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('flight', function(Blueprint $table)
		{
			$table->dropForeign('fk_flightsTripId_tripsId');
			$table->dropForeign('fk_flightsDestinationAirportId_airportId');
			$table->dropForeign('fk_flightsOriginAirportId_airportId');
		});
	}

}
