<?php
/**
 * Flights interface
 *
 * @namespace    App\Repositories
 * @package      App
 * @subpackage   Repositories
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Repositories;

/**
 * Flights interface
 *
 * @package    App
 * @subpackage Repositories
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */

interface FlightInterface
{
	/**
	 * Gets all the record by id
	 *
	 * @return \App\Models\Flight
	 */
	public function getById($id);
}