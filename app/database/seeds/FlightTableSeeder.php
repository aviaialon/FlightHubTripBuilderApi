<?php

class FlightTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('flight')->delete();
        
		\DB::table('flight')->insert(array (
			0 => 
			array (
				'id' => '1',
				'tripId' => '1',
				'originAirportId' => '1',
				'destAirportId' => '3',
			),
			1 => 
			array (
				'id' => '2',
				'tripId' => '1',
				'originAirportId' => '3',
				'destAirportId' => '1',
			),
			2 => 
			array (
				'id' => '3',
				'tripId' => '2',
				'originAirportId' => '1',
				'destAirportId' => '3',
			),
			3 => 
			array (
				'id' => '6',
				'tripId' => '1',
				'originAirportId' => '2',
				'destAirportId' => '3',
			),
		));
	}

}
