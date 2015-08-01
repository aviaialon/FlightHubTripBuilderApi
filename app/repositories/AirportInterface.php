<?php
/**
 * Airport interface
 *
 * @namespace    App\Repositories
 * @package      App
 * @subpackage   Repositories
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Repositories;

/**
 * Airport interface
 *
 * @package    App
 * @subpackage Repositories
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */

interface AirportInterface
{
	/**
	 * Gets all the record by id
	 *
	 * @return \App\Models\Airport
	 */
	public function getById($id);
	
	/**
	 * Gets all the available airports
	 * 
	 * @return \App\Models\Airport[]
	 */
	public function getAll();
	
	/**
	 * Gets an airport by code
	 * 
	 * @param  string $code The airport code
	 * @return \App\Models\Airport
	 */
	public function getByCode($code);
}