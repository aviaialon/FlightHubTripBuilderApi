<?php
/**
 * Flights Repository
 *
 * @namespace    App\Repositories
 * @package      App
 * @subpackage   Repositories
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Repositories;

/**
 * Flights Repository
 *
 * @package    App
 * @subpackage Repositories
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */

class Flight
	extends RepositoryBase implements FlightInterface
{
	/**
	 * Returns the record by id
	 *
	 * @param  integer $id
	 * @return \App\Models\Flight
	 */
	public function getById($id)
	{
		return \App\Models\Flight::find((int) $id);
	}
}