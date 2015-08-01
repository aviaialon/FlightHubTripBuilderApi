<?php
/**
 * Trips Repository
 *
 * @namespace    App\Repositories
 * @package      App
 * @subpackage   Repositories
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Repositories;

/**
 * Trips Repository
 *
 * @package    App
 * @subpackage Repositories
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */

class Trip
	extends RepositoryBase implements TripInterface
{
	/**
	 * Returns the record by id
	 * 
	 * @param  integer $id
	 * @return \App\Models\Trip
	 */
	public function getById($id)
	{
		return \App\Models\Trip::find((int) $id);
	}
	
	/**
	 * Creates a new trip
	 *
	 * @param  string $name (Optional) The trip name
	 * @return \App\Models\Trip
	 */
	public function create($name = null)
	{
		if (empty($name) === true) {
			$name = 'Fun in the sun!';
		}
		
		return \App\Models\Trip::create(array('name' => $name));
	}
}