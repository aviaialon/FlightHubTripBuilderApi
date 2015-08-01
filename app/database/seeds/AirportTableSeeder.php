<?php

class AirportTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('airport')->delete();
        
		\DB::table('airport')->insert(array (
			0 => 
			array (
				'id' => '1',
				'code' => 'YYZ',
				'city' => 'Toronto',
				'name' => 'Lester B. Pearson International Airport',
			),
			1 => 
			array (
				'id' => '2',
				'code' => 'YTZ',
				'city' => 'Toronto',
				'name' => 'Billy Bishop Toronto City Centre Airport',
			),
			2 => 
			array (
				'id' => '3',
				'code' => 'YUL',
				'city' => 'Montreal',
				'name' => 'Pierre Elliott Trudeau International Airport',
			),
			3 => 
			array (
				'id' => '5',
				'code' => 'YOW',
				'city' => 'Ottawa',
				'name' => 'Macdonald-Cartier International Airport',
			),
			4 => 
			array (
				'id' => '6',
				'code' => 'YYC',
				'city' => 'Calgary',
				'name' => 'Calgary International Airport',
			),
		));
	}

}
