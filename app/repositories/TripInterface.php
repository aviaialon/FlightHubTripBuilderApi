<?php
/**
 * Trips interface
 *
 * @namespace    App\Repositories
 * @package      App
 * @subpackage   Repositories
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Repositories;

/**
 * Trips interface
 *
 * @package    App
 * @subpackage Repositories
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */

interface TripInterface
{
	/**
	 * Gets all the record by id
	 *
	 * @return \App\Models\Trip
	 */
	public function getById($id);
}