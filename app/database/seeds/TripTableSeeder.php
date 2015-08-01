<?php

class TripTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('trip')->delete();
        
		\DB::table('trip')->insert(array (
			0 => 
			array (
				'id' => '1',
				'name' => 'My cool test',
			),
			1 => 
			array (
				'id' => '2',
				'name' => 'Fun in the sun!',
			)
		));
	}

}
